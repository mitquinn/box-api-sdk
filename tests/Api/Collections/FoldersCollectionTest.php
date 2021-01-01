<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Faker\Guesser\Name;
use Mitquinn\BoxApiSdk\Resources\FolderResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Mitquinn\BoxApiSdk\Resources\UserResource;
use Mitquinn\BoxApiSdk\Tests\Api\BoxServiceTest;

/**
 * Class FoldersCollectionTest
 * @package Mitquinn\BoxApiSdk\Tests\Api\Collections
 */
class FoldersCollectionTest extends BoxServiceTest
{

    public function testGetFolderInformation()
    {
        $folderResource = $this->getBoxService()->folders()->getFolderInformation(id: 0);
        static::assertInstanceOf(FolderResource::class, $folderResource);
    }


    /**
     * Todo: Change id to real id not 0
     */
    public function testGetFolderInformationFillFields()
    {
        $folderResource = $this->getBoxService()->folders()->getFolderInformation(id: 0,
            query: ['fields' => 'id,type,allowed_invitee_roles,allowed_shared_link_access_levels,can_non_owners_invite,can_non_owners_view_collaborators,classification,content_created_at,content_modified_at,created_at,created_by,description,etag,expires_at,folder_upload_email,has_collaborations,is_collaboration_restricted_to_enterprise,is_externally_owned,item_collection,item_status,metadata,modified_at,modified_by,name,owned_by,parent,path_collection,permissions,purged_at,sequence_id,shared_link,size,sync_state,tags,trashed_at,watermark_info']);

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

        /** @info meta doesn't seem to be returned even when specified. Seems like a bug on Boxs end  */
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
        $itemsResource = $this->getBoxService()->folders()->listItemsInFolder(id: 0);
        static::assertInstanceOf(ItemsResource::class, $itemsResource);
    }

    public function testCreateFolderTest()
    {
        $body = [
            'name' => $this->faker->name,
            'parent' => [
                'id' => 0
            ]
        ];

        $folderResource = $this->getBoxService()->folders()->createFolder($body);
        static::assertInstanceOf(FolderResource::class, $folderResource);
    }




}