<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;


use Mitquinn\BoxApiSdk\Resources\CollaborationResource;
use Mitquinn\BoxApiSdk\Tests\Api\BaseTest;

class CollaborationsCollectionTest extends BaseTest
{


    public function testCreateCollaboration()
    {
        $folderBody = [
            'name' => $this->faker->name,
            'parent' => [
                'id' => 0
            ]
        ];

        $folderResource = $this->getBoxService()->folders()->createFolder($folderBody);


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




}