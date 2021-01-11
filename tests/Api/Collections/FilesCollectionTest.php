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




}