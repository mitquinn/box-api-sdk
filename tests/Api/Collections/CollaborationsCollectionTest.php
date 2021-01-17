<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;


use Mitquinn\BoxApiSdk\Resources\CollaborationResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Tests\Api\BaseTest;

/**
 * Class CollaborationsCollectionTest
 * @package Mitquinn\BoxApiSdk\Tests\Api\Collections
 */
class CollaborationsCollectionTest extends BaseTest
{

    public function testCreateCollaboration()
    {
        $folderResource = $this->createFolder();

        $body = [
            'accessible_by' => [
                'type' => 'user',
                'login' => $_ENV['PersonalEmail']
            ],
            'item' => [
                'id' => $folderResource->getId(),
                'type' => 'folder'
            ],
            'role' => 'viewer'
        ];

        $collaborationResource = $this->getBoxService()->collaborations()->createCollaboration($body);
        static::assertInstanceOf(CollaborationResource::class, $collaborationResource);

        $this->getBoxService()->folders()->deleteFolder($folderResource->getId());
    }


    public function testGetCollaboration()
    {
        //Create Folder
        $folderResource = $this->createFolder();

        //Create Collaboration
        $collaborationResource = $this->createCollaboration($folderResource);

        //Get the Collaboration
        $getCollaborationResource = $this->getBoxService()->collaborations()->getCollaboration($collaborationResource->getId());
        static::assertInstanceOf(CollaborationResource::class, $getCollaborationResource);

        $this->getBoxService()->folders()->deleteFolder($folderResource->getId());
    }

    public function testUpdateCollaboration()
    {
        $folderResource = $this->createFolder();

        $collaborationResource = $this->createCollaboration($folderResource);

        $body = [
            'role' => 'previewer'
        ];

        $updateCollaborationResource = $this->getBoxService()->collaborations()->updateCollaboration($collaborationResource->getId(), $body);
        static::assertInstanceOf(CollaborationResource::class, $updateCollaborationResource);
        static::assertEquals($updateCollaborationResource->getRole(), 'previewer');

        $this->getBoxService()->folders()->deleteFolder($folderResource->getId());
    }

    public function testRemoveCollaboration()
    {
        $folderResource = $this->createFolder();
        $collaborationResource = $this->createCollaboration($folderResource);
        $noContentResource = $this->getBoxService()->collaborations()->removeCollaboration($collaborationResource->getId());
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
        $this->getBoxService()->folders()->deleteFolder($folderResource->getId());
    }

}