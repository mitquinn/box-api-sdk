<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;


use Mitquinn\BoxApiSdk\Resources\CollaborationResource;
use Mitquinn\BoxApiSdk\Tests\Api\BaseTest;

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

        //Get the Collaboration
        $getCollaborationResource = $this->getBoxService()->collaborations()->getCollaboration($collaborationResource->getId());
        static::assertInstanceOf(CollaborationResource::class, $getCollaborationResource);

        $this->getBoxService()->folders()->deleteFolder($folderResource->getId());
    }




}