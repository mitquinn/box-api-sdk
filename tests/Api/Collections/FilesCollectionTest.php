<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Carbon\Carbon;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\FileResource;
use Mitquinn\BoxApiSdk\Resources\FilesResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Tests\Api\BaseTest;

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
        $filesResource = $this->getBoxService()->files()->uploadFile(body: $body);
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

        return $this->getBoxService()->files()->uploadFile(body: $body);
    }


    public function testUploadImage()
    {
        $filesResource = $this->uploadPng();
        static::assertInstanceOf(FilesResource::class, $filesResource);
        $entriesArray = $filesResource->getEntries();
        $fileResource = $entriesArray[0];
        $noContentResource = $this->getBoxService()->files()->deleteFile($fileResource->getId());
    }



    public function testUploadFile()
    {
        $fileResource = $this->uploadFile();
        $noContentResource = $this->getBoxService()->files()->deleteFile($fileResource->getId());
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }

    public function testGetFileInformation()
    {
        $oldFileResource = $this->uploadFile();
        $fileResource = $this->getBoxService()->files()->getFileInformation($oldFileResource->getId());
        static::assertInstanceOf(FileResource::class, $fileResource);
        $noContentResource = $this->getBoxService()->files()->deleteFile($fileResource->getId());
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }

    public function testDeleteFile()
    {
        $fileResource = $this->uploadFile();
        $noContentResource = $this->getBoxService()->files()->deleteFile($fileResource->getId());
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
        static::expectException(BoxNotFoundException::class);
        $this->getBoxService()->files()->getFileInformation($fileResource->getId());
    }

    public function testGetFileThumbnail()
    {
        $filesResource = $this->uploadPng();
        $entriesArray = $filesResource->getEntries();
        $fileResource = $entriesArray[0];
        $noContentResource = $this->getBoxService()->files()->getFileThumbnail($fileResource->getId(), 'png');
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
        $headers = $noContentResource->getHeaders();
        static::assertArrayHasKey('Location', $headers);
        //Todo: Maybe I want to validate the url of the Location?
        $this->getBoxService()->files()->deleteFile($fileResource->getId());
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

        $fileResource = $this->getBoxService()->files()->copyFile($oldFileResource->getId(), $body);
        static::assertInstanceOf(FileResource::class, $fileResource);
        static::assertEquals($newFileName, $fileResource->getName());
        $this->getBoxService()->files()->deleteFile($oldFileResource->getId());
        $this->getBoxService()->files()->deleteFile($fileResource->getId());
    }


    public function testListFileCollaborations()
    {
        $fileResource = $this->uploadFile();
        $collaborationsResource = $this->getBoxService()->files()->listFileCollaborations($fileResource->getId());
        static::assertInstanceOf(CollaborationsResource::class, $collaborationsResource);
        $noContentResource = $this->getBoxService()->files()->deleteFile($fileResource->getId());
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }



}