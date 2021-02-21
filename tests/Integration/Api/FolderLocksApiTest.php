<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Requests\FolderLocks\CreateFolderLockOnFolderRequest;
use Mitquinn\BoxApiSdk\Requests\FolderLocks\DeleteFolderLockRequest;
use Mitquinn\BoxApiSdk\Requests\FolderLocks\ListFolderLocksOnFolderRequest;
use Mitquinn\BoxApiSdk\Resources\FolderLock;
use Mitquinn\BoxApiSdk\Resources\FolderLocks;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class FolderLocksApiTest
 * @package Mitquinn\BoxApiSdk\Tests\Integration\Api
 */
class FolderLocksApiTest extends BaseTest
{

    public function testListFolderLocksOnFolder()
    {
        $folderResource = $this->createFolder();

        $query = [
            'folder_id' => $folderResource->getId()
        ];

        $request = new ListFolderLocksOnFolderRequest($query);

        $folderLocksResource = $this->getBoxService()->folderLocks()->listFolderLocksOnFolder($request);
        static::assertInstanceOf(FolderLocks::class, $folderLocksResource);

        $this->deleteFolder($folderResource->getId());
    }

    public function testCreateAndDeleteFolderLockOnFolder()
    {
        $folderResource = $this->createFolder();

        $body = [
            'folder' => [
                'id' => $folderResource->getId(),
                'type' => 'folder'
            ]
        ];

        //Create the Lock
        $request = new CreateFolderLockOnFolderRequest($body);
        $folderLockResource = $this->getBoxService()->folderLocks()->createFolderLockOnFolder($request);
        static::assertInstanceOf(FolderLock::class, $folderLockResource);

        //Deletes the lock
        $request2 = new DeleteFolderLockRequest($folderLockResource->getId());
        $noContentResource = $this->getBoxService()->folderLocks()->deleteFolderLock($request2);
        static::assertInstanceOf(NoContent::class, $noContentResource);

        $this->deleteFolder($folderResource->getId());

    }
}