<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;


use Mitquinn\BoxApiSdk\Requests\Collaborations\CreateCollaborationRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\GetCollaborationRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\ListPendingCollaborationsRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\RemoveCollaborationRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\UpdateCollaborationRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationResource;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class CollaborationsCollectionTest
 * @package Mitquinn\BoxApiSdk\Tests\Api\Collections
 */
class CollaborationsApiTest extends BaseTest
{

    public function testCreateCollaboration()
    {
        //Create the folder
        $folderResource = $this->createFolder();

        //Create Collaboration Request
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

        $request = new CreateCollaborationRequest(body: $body);
        $collaborationResource = $this->getBoxService()->collaborations()->createCollaboration($request);
        static::assertInstanceOf(CollaborationResource::class, $collaborationResource);

        //Delete the folder
        $this->deleteFolder($folderResource->getId());
    }


    public function testGetCollaboration()
    {
        //Create Folder
        $folderResource = $this->createFolder();

        //Create Collaboration
        $collaborationResource = $this->createCollaboration($folderResource);

        //Get the Collaboration
        $request = new GetCollaborationRequest($collaborationResource->getId());
        $getCollaborationResource = $this->getBoxService()->collaborations()->getCollaboration($request);
        static::assertInstanceOf(CollaborationResource::class, $getCollaborationResource);

        //Delete the folder.
        $this->deleteFolder($folderResource->getId());
    }

    public function testUpdateCollaboration()
    {
        //Create Folder
        $folderResource = $this->createFolder();

        //Create Collaboration
        $collaborationResource = $this->createCollaboration($folderResource);

        $body = [
            'role' => 'previewer'
        ];

        //Update Collaboration
        $request = new UpdateCollaborationRequest($collaborationResource->getId(), $body);
        $updateCollaborationResource = $this->getBoxService()->collaborations()->updateCollaboration($request);
        static::assertInstanceOf(CollaborationResource::class, $updateCollaborationResource);
        static::assertEquals($updateCollaborationResource->getRole(), 'previewer');

        //Delete Folder
        $this->deleteFolder($folderResource->getId());
    }

    public function testRemoveCollaboration()
    {
        //Create the folder.
        $folderResource = $this->createFolder();

        //Create the collaboration
        $collaborationResource = $this->createCollaboration($folderResource);

        //Remove the collaboration
        $request = new RemoveCollaborationRequest($collaborationResource->getId());
        $noContentResource = $this->getBoxService()->collaborations()->removeCollaboration($request);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);

        //Delete folder
        $this->deleteFolder($folderResource->getId());
    }

    public function testListPendingCollaborations()
    {
        $query = [
            'status' => 'pending'
        ];

        $request = new ListPendingCollaborationsRequest($query);
        $collaborationsResource = $this->getBoxService()->collaborations()->listPendingCollaborations($request);
        static::assertInstanceOf(CollaborationsResource::class, $collaborationsResource);
    }

}