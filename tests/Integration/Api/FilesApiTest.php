<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Carbon\Carbon;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\Files\CopyFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\DeleteFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\GetFileInformationRequest;
use Mitquinn\BoxApiSdk\Requests\Files\GetFileThumbnailRequest;
use Mitquinn\BoxApiSdk\Requests\Files\ListFileCollaborationsRequest;
use Mitquinn\BoxApiSdk\Requests\Files\UpdateFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\UploadFileRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\FileResource;
use Mitquinn\BoxApiSdk\Resources\FilesResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class FilesCollectionTest
 * @package Api\Collections
 */
class FilesCollectionTest extends BaseTest
{

    public function uploadFile(): FileResource
    {
        $name = $this->faker->firstName;
        $path = "tests/TestingData/TestingFile.txt";
        $dateTimeString = Carbon::now()->toRfc3339String();
        $body = [
            'attributes' => [
                'content_created_at' => $dateTimeString,
                'content_modified_at' => $dateTimeString,
                'name' => $name,
                'parent' => [
                    'id' => 0
                ]
            ],
            'file' => [
                'name' => 'file',
                'contents' => file_get_contents($path),
                'filename' => $name
            ]
        ];

        $request = new UploadFileRequest(body: $body);
        $filesResource = $this->getBoxService()->files()->uploadFile($request);
        static::assertInstanceOf(FilesResource::class, $filesResource);
        static::assertIsArray($filesResource->getEntries());
        static::assertIsInt($filesResource->getTotalCount());
        $entriesArray = $filesResource->getEntries();
        return $entriesArray[0];
    }

    public function uploadPng(): FilesResource
    {
        $name = $this->faker->firstName;
        $path = "tests/TestingData/bulbasaur.png";
        $dateTimeString = Carbon::now()->toRfc3339String();
        $body = [
            'attributes' => [
                'content_created_at' => $dateTimeString,
                'content_modified_at' => $dateTimeString,
                'name' => $name,
                'parent' => [
                    'id' => 0
                ]
            ],
            'file' => [
                'name' => 'file',
                'contents' => file_get_contents($path),
                'filename' => $name
            ]
        ];

        $request = new UploadFileRequest(body: $body);
        return $this->getBoxService()->files()->uploadFile($request);
    }


    public function testUploadImage()
    {
        $filesResource = $this->uploadPng();
        static::assertInstanceOf(FilesResource::class, $filesResource);
        $entriesArray = $filesResource->getEntries();
        $fileResource = $entriesArray[0];

        //Clean up
        $deleteRequest = new DeleteFileRequest($fileResource->getId());
        $noContentResource = $this->getBoxService()->files()->deleteFile($deleteRequest);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }



    public function testUploadFile()
    {
        $fileResource = $this->uploadFile();

        $deleteRequest = new DeleteFileRequest($fileResource->getId());
        $noContentResource = $this->getBoxService()->files()->deleteFile($deleteRequest);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }

    public function testGetFileInformation()
    {
        $oldFileResource = $this->uploadFile();
        $request = new GetFileInformationRequest($oldFileResource->getId());
        $fileResource = $this->getBoxService()->files()->getFileInformation($request);
        static::assertInstanceOf(FileResource::class, $fileResource);

        //Clean up
        $deleteRequest = new DeleteFileRequest($fileResource->getId());
        $noContentResource = $this->getBoxService()->files()->deleteFile($deleteRequest);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }

    public function testDeleteFile()
    {
        $fileResource = $this->uploadFile();
        $request = new DeleteFileRequest($fileResource->getId());
        $noContentResource = $this->getBoxService()->files()->deleteFile($request);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
        static::expectException(BoxNotFoundException::class);
        $this->getBoxService()->files()->getFileInformation($fileResource->getId());
    }

    public function testGetFileThumbnail()
    {
        $filesResource = $this->uploadPng();
        $entriesArray = $filesResource->getEntries();
        $fileResource = $entriesArray[0];

        $request = new GetFileThumbnailRequest($fileResource->getId(), 'png');
        $noContentResource = $this->getBoxService()->files()->getFileThumbnail($request);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
        $headers = $noContentResource->getHeaders();
        static::assertArrayHasKey('Location', $headers);
        //Todo: Maybe I want to validate the url of the Location?

        //Clean up
        $deleteRequest = new DeleteFileRequest($fileResource->getId());
        $this->getBoxService()->files()->deleteFile($deleteRequest);
    }


    public function testCopyFile()
    {
        $oldFileResource = $this->uploadFile();
        $newFileName = $oldFileResource->getName().'- Copy';
        $body = [
            'name' => $newFileName,
            'parent' => [
                'id' => 0
            ]
        ];

        $request = new CopyFileRequest($oldFileResource->getId(), $body);
        $fileResource = $this->getBoxService()->files()->copyFile($request);
        static::assertInstanceOf(FileResource::class, $fileResource);
        static::assertEquals($newFileName, $fileResource->getName());

        // Clean up
        $deleteRequest1 = new DeleteFileRequest($oldFileResource->getId());
        $this->getBoxService()->files()->deleteFile($deleteRequest1);
        $deleteRequest2 = new DeleteFileRequest($fileResource->getId());
        $this->getBoxService()->files()->deleteFile($deleteRequest2);
    }


    public function testListFileCollaborations()
    {
        $fileResource = $this->uploadFile();
        $request = new ListFileCollaborationsRequest($fileResource->getId());
        $collaborationsResource = $this->getBoxService()->files()->listFileCollaborations($request);
        static::assertInstanceOf(CollaborationsResource::class, $collaborationsResource);

        //Clean Up
        $deleteRequest = new DeleteFileRequest($fileResource->getId());
        $noContentResource = $this->getBoxService()->files()->deleteFile($deleteRequest);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }

    public function testUpdateFile()
    {
        $fileResource = $this->uploadFile();
        $newName = $this->faker->firstName;
        $request = new UpdateFileRequest(id: $fileResource->getId(), body: ['name' => $newName]);
        $updatedFileResource = $this->getBoxService()->files()->updateFile($request);
        static::assertInstanceOf(FileResource::class, $updatedFileResource);
        static::assertEquals($newName, $updatedFileResource->getName());

        //Clean Up
        $deleteRequest = new DeleteFileRequest($fileResource->getId());
        $noContentResource = $this->getBoxService()->files()->deleteFile($deleteRequest);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }



}