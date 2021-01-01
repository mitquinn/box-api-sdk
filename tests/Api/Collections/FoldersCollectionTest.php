<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Mitquinn\BoxApiSdk\Resources\FolderResource;
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


    public function testGetFolderInformationFillFields()
    {
        $folderResource = $this->getBoxService()->folders()->getFolderInformation(id: 0,
            query: ['fields' => 'id,type,allowed_invitee_roles,allowed_shared_link_access_levels,can_non_owners_invite,can_non_owners_view_collaborators,classification,content_created_at,content_modified_at,created_at,created_by,description,etag,expires_at,folder_upload_email,has_collaborations,is_collaboration_restricted_to_enterprise,is_externally_owned,item_collection,item_status,metadata,modified_at,modified_by,name,owned_by,parent,path_collection,permissions,purged_at,sequence_id,shared_link,size,sync_state,tags,trashed_at,watermark_info']);

        static::assertInstanceOf(FolderResource::class, $folderResource);
        static::assertIsInt($folderResource->getId());
        static::assertIsString($folderResource->getType());

    }


}