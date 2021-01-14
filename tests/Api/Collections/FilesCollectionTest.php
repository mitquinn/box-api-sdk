<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Carbon\Carbon;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
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

    public function uploadFile(): FilesResource
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
        return $this->getBoxService()->files()->uploadFile(body: $body);
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
        $filesResource = $this->uploadFile();
        static::assertInstanceOf(FilesResource::class, $filesResource);
        static::assertIsArray($filesResource->getEntries());
        static::assertIsInt($filesResource->getTotalCount());
        $entriesArray = $filesResource->getEntries();
        $fileResource = $entriesArray[0];
        $noContentResource = $this->getBoxService()->files()->deleteFile($fileResource->getId());
    }

    public function testGetFileInformation()
    {
        $filesResource = $this->uploadFile();
        $entriesArray = $filesResource->getEntries();
        $oldFileResource = $entriesArray[0];
        $fileResource = $this->getBoxService()->files()->getFileInformation($oldFileResource->getId());
        static::assertInstanceOf(FileResource::class, $fileResource);
        $noContentResource = $this->getBoxService()->files()->deleteFile($fileResource->getId());
    }

    public function testDeleteFile()
    {
        $filesResource = $this->uploadFile();
        $entriesArray = $filesResource->getEntries();
        $fileResource = $entriesArray[0];
        $noContentResource = $this->getBoxService()->files()->deleteFile($fileResource->getId());
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
        static::expectException(BoxNotFoundException::class);
        $checkFileResource = $this->getBoxService()->files()->getFileInformation($fileResource->getId());
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
        $filesResource = $this->uploadFile();
        $entriesArray = $filesResource->getEntries();
        $oldFileResource = $entriesArray[0];
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




}