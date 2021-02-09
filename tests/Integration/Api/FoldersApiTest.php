<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Requests\Folders\CopyFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\CreateFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\DeleteFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\GetFolderInformationRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\ListFolderCollaborationsRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\ListItemsInFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\UpdateFolderRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\FolderResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Resources\UserResource;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class FoldersCollectionTest
 * @package Mitquinn\BoxApiSdk\Tests\Api\Collections
 */
class FoldersCollectionTest extends BaseTest
{

    public function testGetFolderInformation()
    {
        $request = new GetFolderInformationRequest(0);
        $folderResource = $this->getBoxService()->folders()->getFolderInformation($request);
        static::assertInstanceOf(FolderResource::class, $folderResource);
    }


    /**
     * Todo: Change id to real id not 0
     */
    public function testGetFolderInformationFillFields()
    {
        $request = new GetFolderInformationRequest(id: 0,
            query: ['fields' => 'id,type,allowed_invitee_roles,allowed_shared_link_access_levels,can_non_owners_invite,can_non_owners_view_collaborators,classification,content_created_at,content_modified_at,created_at,created_by,description,etag,expires_at,folder_upload_email,has_collaborations,is_collaboration_restricted_to_enterprise,is_externally_owned,item_collection,item_status,metadata,modified_at,modified_by,name,owned_by,parent,path_collection,permissions,purged_at,sequence_id,shared_link,size,sync_state,tags,trashed_at,watermark_info']
        );


        $folderResource = $this->getBoxService()->folders()->getFolderInformation($request);

        static::assertInstanceOf(FolderResource::class, $folderResource);
        static::assertIsInt($folderResource->getId());
        static::assertIsString($folderResource->getType());
        static::assertIsArray($folderResource->getAllowedInviteeRoles());
        static::assertIsArray($folderResource->getAllowedSharedLinkAccessLevels());
        static::assertIsBool($folderResource->isCanNonOwnersInvite());
        static::assertIsBool($folderResource->isCanNonOwnersViewCollaborators());
        static::assertNull($folderResource->getClassification());
        static::assertNull($folderResource->getContentCreatedAt());
        static::assertNull($folderResource->getContentModifiedAt());
        static::assertNull($folderResource->getCreatedAt());
        static::assertInstanceOf(UserResource::class, $folderResource->getCreatedBy());
        static::assertIsString($folderResource->getDescription());
        static::assertNull($folderResource->getEtag());
        static::assertNull($folderResource->getExpiresAt());
        static::assertNull($folderResource->getFolderUploadEmail());
        static::assertIsBool($folderResource->isHasCollaborations());
        static::assertIsBool($folderResource->isIsCollaborationRestrictedToEnterprise());
        static::assertIsBool($folderResource->isIsExternallyOwned());
        static::assertInstanceOf(ItemsResource::class, $folderResource->getItemCollection());
        static::assertIsString($folderResource->getItemStatus());

        /** @info meta doesn't seem to be returned even when specified. Seems like a bug on Box's end  */
        //static::assertIsArray($folderResource->getMetadata());

        static::assertNull($folderResource->getModifiedAt());
        static::assertInstanceOf(UserResource::class, $folderResource->getModifiedBy());
        static::assertIsString($folderResource->getName());
        static::assertInstanceOf(UserResource::class, $folderResource->getOwnedBy());
        static::assertNull($folderResource->getParent());
        static::assertIsArray($folderResource->getPathCollection());
        static::assertIsArray($folderResource->getPermissions());
        static::assertNull($folderResource->getPurgedAt());
        static::assertNull($folderResource->getSequenceId());
        static::assertNull($folderResource->getSharedLink());
        static::assertIsInt($folderResource->getSize());
        static::assertIsString($folderResource->getSyncState());
        static::assertIsArray($folderResource->getTags());
        static::assertNull($folderResource->getTrashedAt());
        static::assertIsArray($folderResource->getWatermarkInfo());
    }

    public function testListItemsInFolderTest()
    {
        $request = new ListItemsInFolderRequest(0);
        $itemsResource = $this->getBoxService()->folders()->listItemsInFolder($request);
        static::assertInstanceOf(ItemsResource::class, $itemsResource);
    }

    public function testCreateFolder()
    {
        $body = [
            'name' => $this->faker->name,
            'parent' => [
                'id' => 0
            ]
        ];

        $request = new CreateFolderRequest(body: $body);
        $folderResource = $this->getBoxService()->folders()->createFolder($request);
        static::assertInstanceOf(FolderResource::class, $folderResource);
    }

    public function testDeleteFolder()
    {
        $body = [
            'name' => $this->faker->name,
            'parent' => [
                'id' => 0
            ]
        ];
        $createFolderRequest = new CreateFolderRequest(body: $body);
        $folderResource = $this->getBoxService()->folders()->createFolder($createFolderRequest);
        static::assertInstanceOf(FolderResource::class, $folderResource);


        $deleteThisId = $folderResource->getId();
        $deleteFolderRequest = new DeleteFolderRequest(id: $deleteThisId);
        //This works
        //$deleteFolderRequest = new GenericRequest('DELETE', "folders/$deleteThisId");
        $noContentResource = $this->getBoxService()->folders()->deleteFolder($deleteFolderRequest);
        static::assertInstanceOf(NoContentResource::class ,$noContentResource);

    }

    public function testUpdateFolder()
    {
        //Create the Folder
        $name = $this->faker->name;
        $createBody = [
            'name' => $name,
            'parent' => [
                'id' => 0
            ]
        ];
        $createRequest = new CreateFolderRequest($createBody);
        $folderResource = $this->getBoxService()->folders()->createFolder($createRequest);
        static::assertInstanceOf(FolderResource::class, $folderResource);

        // Update the Folder
        $updateBody = [
            'name' => "Updated $name"
        ];
        $updateRequest = new UpdateFolderRequest(id: $folderResource->getId(), body: $updateBody);
        $updateFolderResource = $this->getBoxService()->folders()->updateFolder($updateRequest);
        static::assertInstanceOf(FolderResource::class, $updateFolderResource);
        static::assertEquals("Updated $name", $updateFolderResource->getName());

        //Delete the Folder
        $deleteThisId = $folderResource->getId();
        $deleteRequest = new DeleteFolderRequest($deleteThisId);
        $noContentResource = $this->getBoxService()->folders()->deleteFolder($deleteRequest);
        static::assertInstanceOf(NoContentResource::class ,$noContentResource);
    }

    public function testCopyFolder()
    {
        //Create the Folder
        $name = $this->faker->name;
        $createBody = [
            'name' => $name,
            'parent' => [
                'id' => 0
            ]
        ];

        $createRequest = new CreateFolderRequest($createBody);
        $folderResource = $this->getBoxService()->folders()->createFolder($createRequest);
        static::assertInstanceOf(FolderResource::class, $folderResource);

        // Copy the Folder
        $copyBody = [
            'name' => "Copy $name",
            'parent' => [
                'id' => 0
            ]
        ];
        $copyRequest = new CopyFolderRequest(id: $folderResource->getId(), body: $copyBody);
        $copyFolderResource = $this->getBoxService()->folders()->copyFolder($copyRequest);
        static::assertInstanceOf(FolderResource::class, $copyFolderResource);
        static::assertEquals("Copy $name", $copyFolderResource->getName());
        static::assertNotEquals($folderResource->getId(), $copyFolderResource->getId());

        //Delete the Folder
        $deleteRequest = new DeleteFolderRequest($folderResource->getId());
        $noContentResource = $this->getBoxService()->folders()->deleteFolder($deleteRequest);
        static::assertInstanceOf(NoContentResource::class ,$noContentResource);

        //Delete the copy folder
        $deleteCopyRequest = new DeleteFolderRequest($copyFolderResource->getId());
        $noContentResource2 = $this->getBoxService()->folders()->deleteFolder($deleteCopyRequest);
        static::assertInstanceOf(NoContentResource::class ,$noContentResource2);
    }

    public function testListFolderCollaborations()
    {
        $folderResource = $this->createFolder();
        $request = new ListFolderCollaborationsRequest($folderResource->getId());
        $collaborationsResource = $this->getBoxService()->folders()->listFolderCollaborations($request);
        static::assertInstanceOf(CollaborationsResource::class, $collaborationsResource);

        //Deleting
        $deleteRequest = new DeleteFolderRequest($folderResource->getId());
        $noContentResource = $this->getBoxService()->folders()->deleteFolder($deleteRequest);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }



}