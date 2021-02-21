<?php

namespace Mitquinn\BoxApiSdk\Resources;


use Mitquinn\BoxApiSdk\Traits\Properties\HasAllowedInviteeRoles;
use Mitquinn\BoxApiSdk\Traits\Properties\HasClassification;
use Mitquinn\BoxApiSdk\Traits\Properties\HasContentCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasContentModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasDescription;
use Mitquinn\BoxApiSdk\Traits\Properties\HasETag;
use Mitquinn\BoxApiSdk\Traits\Properties\HasExpiresAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasItemStatus;
use Mitquinn\BoxApiSdk\Traits\Properties\HasIsExternallyOwned;
use Mitquinn\BoxApiSdk\Traits\Properties\HasMetadata;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasName;
use Mitquinn\BoxApiSdk\Traits\Properties\HasOwnedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasParent;
use Mitquinn\BoxApiSdk\Traits\Properties\HasPathCollection;
use Mitquinn\BoxApiSdk\Traits\Properties\HasPermissions;
use Mitquinn\BoxApiSdk\Traits\Properties\HasPurgedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasSequenceId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasSharedLink;
use Mitquinn\BoxApiSdk\Traits\Properties\HasSize;
use Mitquinn\BoxApiSdk\Traits\Properties\HasTags;
use Mitquinn\BoxApiSdk\Traits\Properties\HasTrashedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;
use Mitquinn\BoxApiSdk\Traits\Properties\HasWatermarkInfo;
use Psr\Http\Message\ResponseInterface;

/**
 * Class FolderResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class Folder extends Resource
{
    use HasAllowedInviteeRoles,
        HasClassification,
        HasContentCreatedAt,
        HasContentModifiedAt,
        HasCreatedAt,
        HasCreatedBy,
        HasDescription,
        HasETag,
        HasExpiresAt,
        HasId,
        HasItemStatus,
        HasIsExternallyOwned,
        HasModifiedAt,
        HasMetadata,
        HasModifiedBy,
        HasName,
        HasOwnedBy,
        HasParent,
        HasPathCollection,
        HasPermissions,
        HasPurgedAt,
        HasSequenceId,
        HasSharedLink,
        HasSize,
        HasTags,
        HasTrashedAt,
        HasType,
        HasWatermarkInfo;

    /** @var array $allowed_shared_link_access_levels */
    protected array $allowed_shared_link_access_levels;

    /** @var bool $can_non_owners_invite */
    protected bool $can_non_owners_invite;

    /** @var bool $can_non_owners_view_collaborators */
    protected bool $can_non_owners_view_collaborators;

    /** @var array|null $folder_upload_email */
    protected array|null $folder_upload_email;

    /** @var bool $has_collaborations */
    protected bool $has_collaborations;

    /** @var bool $is_collaboration_restricted_to_enterprise */
    protected bool $is_collaboration_restricted_to_enterprise;

    /** @var ItemsResource $item_collection */
    protected ItemsResource $item_collection;

    /** @var string $sync_state */
    protected string $sync_state;

    /**
     * @param array $response
     * @return $this
     */
    protected function mapResource(array $response): static
    {

        if (array_key_exists('id', $response)) {
            $this->setId($response['id']);
        }

        if (array_key_exists('type', $response)) {
            $this->setType($response['type']);
        }

        if (array_key_exists('allowed_invitee_roles', $response)) {
            $this->setAllowedInviteeRoles($response['allowed_invitee_roles']);
        }

        if (array_key_exists('allowed_shared_link_access_levels', $response)) {
            $this->setAllowedSharedLinkAccessLevels($response['allowed_shared_link_access_levels']);
        }

        if (array_key_exists('can_non_owners_invite', $response)) {
            $this->setCanNonOwnersInvite($response['can_non_owners_invite']);
        }

        if (array_key_exists('can_non_owners_view_collaborators', $response)) {
            $this->setCanNonOwnersViewCollaborators($response['can_non_owners_view_collaborators']);
        }

        if (array_key_exists('classification', $response)) {
            $this->setClassification($response['classification']);
        }

        if (array_key_exists('content_created_at', $response)) {
            $this->setContentCreatedAt($response['content_created_at']);
        }

        if (array_key_exists('content_modified_at', $response)) {
            $this->setContentModifiedAt($response['content_modified_at']);
        }

        if (array_key_exists('created_at', $response)) {
            $this->setCreatedAt($response['created_at']);
        }

        if (array_key_exists('created_by', $response)) {
            $this->setCreatedBy(new User($response['created_by']));
        }

        if (array_key_exists('description', $response)) {
            $this->setDescription($response['description']);
        }

        if (array_key_exists('etag', $response)) {
            $this->setEtag($response['etag']);
        }

        if (array_key_exists('expires_at', $response)) {
            $this->setExpiresAt($response['expires_at']);
        }


        if (array_key_exists('folder_upload_email', $response)) {
            $this->setFolderUploadEmail($response['folder_upload_email']);
        }

        if (array_key_exists('has_collaborations', $response)) {
            $this->setHasCollaborations($response['has_collaborations']);
        }

        if (array_key_exists('is_collaboration_restricted_to_enterprise', $response)) {
            $this->setIsCollaborationRestrictedToEnterprise($response['is_collaboration_restricted_to_enterprise']);
        }

        if (array_key_exists('is_externally_owned', $response)) {
            $this->setIsExternallyOwned($response['is_externally_owned']);
        }

        if (array_key_exists('item_collection', $response)) {
            $this->setItemCollection(new ItemsResource($response['item_collection']));
        }

        if (array_key_exists('item_status', $response)) {
            $this->setItemStatus($response['item_status']);
        }

        if (array_key_exists('metadata', $response)) {
            $this->setMetadata($response['metadata']);
        }

        if (array_key_exists('modified_at', $response)) {
            $this->setModifiedAt($response['modified_at']);
        }

        if (array_key_exists('modified_by', $response)) {
            $this->setModifiedBy(new User($response['modified_by']));
        }

        if (array_key_exists('name', $response)) {
            $this->setName($response['name']);
        }

        if (array_key_exists('owned_by', $response)) {
            $this->setOwnedBy(new User($response['owned_by']));
        }

        // Todo: This seems sloppy
        if (array_key_exists('parent', $response)) {
            if (is_null($response['parent'])) {
                $this->setParent(null);
            } else {
                $this->setParent(new Folder($response['parent']));
            }
        }

        if (array_key_exists('path_collection', $response)) {
            $this->setPathCollection($response['path_collection']);
        }

        if (array_key_exists('permissions', $response)) {
            $this->setPermissions($response['permissions']);
        }

        if (array_key_exists('purged_at', $response)) {
            $this->setPurgedAt($response['purged_at']);
        }

        if (array_key_exists('sequence_id', $response)) {
            $this->setSequenceId($response['sequence_id']);
        }

        if (array_key_exists('shared_link', $response)) {
            $this->setSharedLink($response['shared_link']);
        }

        if (array_key_exists('size', $response)) {
            $this->setSize($response['size']);
        }

        if (array_key_exists('sync_state', $response)) {
            $this->setSyncState($response['sync_state']);
        }

        if (array_key_exists('tags', $response)) {
            $this->setTags($response['tags']);
        }

        if (array_key_exists('trashed_at', $response)) {
            $this->setTrashedAt($response['trashed_at']);
        }

        if (array_key_exists('watermark_info', $response)) {
            $this->setWatermarkInfo($response['watermark_info']);
        }

        return $this;
    }

    /*** Start Getters and Setters  ***/

    /**
     * @return array
     */
    public function getAllowedSharedLinkAccessLevels(): array
    {
        return $this->allowed_shared_link_access_levels;
    }

    /**
     * @param array $allowed_shared_link_access_levels
     * @return Folder
     */
    public function setAllowedSharedLinkAccessLevels(array $allowed_shared_link_access_levels): Folder
    {
        $this->allowed_shared_link_access_levels = $allowed_shared_link_access_levels;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCanNonOwnersInvite(): bool
    {
        return $this->can_non_owners_invite;
    }

    /**
     * @param bool $can_non_owners_invite
     * @return Folder
     */
    public function setCanNonOwnersInvite(bool $can_non_owners_invite): Folder
    {
        $this->can_non_owners_invite = $can_non_owners_invite;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCanNonOwnersViewCollaborators(): bool
    {
        return $this->can_non_owners_view_collaborators;
    }

    /**
     * @param bool $can_non_owners_view_collaborators
     * @return Folder
     */
    public function setCanNonOwnersViewCollaborators(bool $can_non_owners_view_collaborators): Folder
    {
        $this->can_non_owners_view_collaborators = $can_non_owners_view_collaborators;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContentModifiedAt(): string|null
    {
        return $this->content_modified_at;
    }

    /**
     * @param string|null $content_modified_at
     * @return Folder
     */
    public function setContentModifiedAt(string|null $content_modified_at): Folder
    {
        $this->content_modified_at = $content_modified_at;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getFolderUploadEmail(): array|null
    {
        return $this->folder_upload_email;
    }

    /**
     * @param array|null $folder_upload_email
     * @return Folder
     */
    public function setFolderUploadEmail(array|null $folder_upload_email): Folder
    {
        $this->folder_upload_email = $folder_upload_email;
        return $this;
    }

    /**
     * @return bool
     */
    public function isHasCollaborations(): bool
    {
        return $this->has_collaborations;
    }

    /**
     * @param bool $has_collaborations
     * @return Folder
     */
    public function setHasCollaborations(bool $has_collaborations): Folder
    {
        $this->has_collaborations = $has_collaborations;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsCollaborationRestrictedToEnterprise(): bool
    {
        return $this->is_collaboration_restricted_to_enterprise;
    }

    /**
     * @param bool $is_collaboration_restricted_to_enterprise
     * @return Folder
     */
    public function setIsCollaborationRestrictedToEnterprise(bool $is_collaboration_restricted_to_enterprise): Folder
    {
        $this->is_collaboration_restricted_to_enterprise = $is_collaboration_restricted_to_enterprise;
        return $this;
    }

    /**
     * @return ItemsResource
     */
    public function getItemCollection(): ItemsResource
    {
        return $this->item_collection;
    }

    /**
     * @param ItemsResource $item_collection
     * @return Folder
     */
    public function setItemCollection(ItemsResource $item_collection): Folder
    {
        $this->item_collection = $item_collection;
        return $this;
    }

    /**
     * @return string
     */
    public function getSyncState(): string
    {
        return $this->sync_state;
    }

    /**
     * @param string $sync_state
     * @return Folder
     */
    public function setSyncState(string $sync_state): Folder
    {
        $this->sync_state = $sync_state;
        return $this;
    }

    /*** End Getters and Setters ***/

}