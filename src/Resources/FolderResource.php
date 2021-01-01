<?php

namespace Mitquinn\BoxApiSdk\Resources;


use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasDescription;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasName;
use Mitquinn\BoxApiSdk\Traits\Properties\HasSize;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;
use Psr\Http\Message\ResponseInterface;

/**
 * Class FolderResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class FolderResource extends BaseResource
{
    use HasId, HasType, HasCreatedAt, HasDescription, HasModifiedAt, HasName, HasSize;

    /** @var array $allowed_invitee_roles */
    protected array $allowed_invitee_roles;

    /** @var array $allowed_shared_link_access_levels */
    protected array $allowed_shared_link_access_levels;

    /** @var bool $can_non_owners_invite */
    protected bool $can_non_owners_invite;

    /** @var bool $can_non_owners_view_collaborators */
    protected bool $can_non_owners_view_collaborators;

    /** @var array|null $classification */
    protected array|null $classification;

    /** @var string|null $content_created_at */
    protected string|null $content_created_at;

    /** @var string|null $content_modified_at */
    protected string|null $content_modified_at;

    /** @var UserResource $created_by */
    protected UserResource $created_by;

    /** @var string|null $etag */
    protected string|null $etag;

    /** @var string|null $expires_at */
    protected string|null $expires_at;

    /** @var array|null $folder_upload_email */
    protected array|null $folder_upload_email;

    /** @var bool $has_collaborations */
    protected bool $has_collaborations;

    /** @var bool $is_collaboration_restricted_to_enterprise */
    protected bool $is_collaboration_restricted_to_enterprise;

    /** @var bool $is_externally_owned */
    protected bool $is_externally_owned;

    /** @var ItemsResource $item_collection */
    protected ItemsResource $item_collection;

    /** @var string $item_status */
    protected string $item_status;

    /** @var array $metadata */
    protected array $metadata;

    /** @var UserResource $modified_by */
    protected UserResource $modified_by;

    /** @var UserResource $owned_by */
    protected UserResource $owned_by;

    /** @var FolderResource|null $parent */
    protected FolderResource|null $parent;

    /** @var array $path_collection */
    protected array $path_collection;

    /** @var array $permissions */
    protected array $permissions;

    /** @var string|null $purged_at */
    protected string|null $purged_at;

    /** @var string|null $sequence_id */
    protected string|null $sequence_id;

    /** @var array|null $shared_link */
    protected array|null $shared_link;

    /** @var string $sync_state */
    protected string $sync_state;

    /** @var array $tags */
    protected array $tags;

    /** @var string|null $trashed_at */
    protected string|null $trashed_at;

    /** @var array $watermark_info */
    protected array $watermark_info;

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
            $this->setCreatedBy(new UserResource($response['created_by']));
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
            $this->setModifiedBy(new UserResource($response['modified_by']));
        }

        if (array_key_exists('name', $response)) {
            $this->setName($response['name']);
        }

        if (array_key_exists('owned_by', $response)) {
            $this->setOwnedBy(new UserResource($response['owned_by']));
        }

        // Todo: This seems sloppy
        if (array_key_exists('parent', $response)) {
            if (is_null($response['parent'])) {
                $this->setParent(null);
            } else {
                $this->setParent(new FolderResource($response['parent']));
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
    public function getAllowedInviteeRoles(): array
    {
        return $this->allowed_invitee_roles;
    }

    /**
     * @param array $allowed_invitee_roles
     * @return FolderResource
     */
    public function setAllowedInviteeRoles(array $allowed_invitee_roles): FolderResource
    {
        $this->allowed_invitee_roles = $allowed_invitee_roles;
        return $this;
    }

    /**
     * @return array
     */
    public function getAllowedSharedLinkAccessLevels(): array
    {
        return $this->allowed_shared_link_access_levels;
    }

    /**
     * @param array $allowed_shared_link_access_levels
     * @return FolderResource
     */
    public function setAllowedSharedLinkAccessLevels(array $allowed_shared_link_access_levels): FolderResource
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
     * @return FolderResource
     */
    public function setCanNonOwnersInvite(bool $can_non_owners_invite): FolderResource
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
     * @return FolderResource
     */
    public function setCanNonOwnersViewCollaborators(bool $can_non_owners_view_collaborators): FolderResource
    {
        $this->can_non_owners_view_collaborators = $can_non_owners_view_collaborators;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getClassification(): array|null
    {
        return $this->classification;
    }

    /**
     * @param array|null $classification
     * @return FolderResource
     */
    public function setClassification(array|null $classification): FolderResource
    {
        $this->classification = $classification;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContentCreatedAt(): string|null
    {
        return $this->content_created_at;
    }

    /**
     * @param string|null $content_created_at
     * @return FolderResource
     */
    public function setContentCreatedAt(string|null $content_created_at): FolderResource
    {
        $this->content_created_at = $content_created_at;
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
     * @return FolderResource
     */
    public function setContentModifiedAt(string|null $content_modified_at): FolderResource
    {
        $this->content_modified_at = $content_modified_at;
        return $this;
    }

    /**
     * @return UserResource
     */
    public function getCreatedBy(): UserResource
    {
        return $this->created_by;
    }

    /**
     * @param UserResource $created_by
     * @return FolderResource
     */
    public function setCreatedBy(UserResource $created_by): FolderResource
    {
        $this->created_by = $created_by;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEtag(): string|null
    {
        return $this->etag;
    }

    /**
     * @param string|null $etag
     * @return FolderResource
     */
    public function setEtag(string|null $etag): FolderResource
    {
        $this->etag = $etag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getExpiresAt(): string|null
    {
        return $this->expires_at;
    }

    /**
     * @param string|null $expires_at
     * @return FolderResource
     */
    public function setExpiresAt(string|null $expires_at): FolderResource
    {
        $this->expires_at = $expires_at;
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
     * @return FolderResource
     */
    public function setFolderUploadEmail(array|null $folder_upload_email): FolderResource
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
     * @return FolderResource
     */
    public function setHasCollaborations(bool $has_collaborations): FolderResource
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
     * @return FolderResource
     */
    public function setIsCollaborationRestrictedToEnterprise(bool $is_collaboration_restricted_to_enterprise): FolderResource
    {
        $this->is_collaboration_restricted_to_enterprise = $is_collaboration_restricted_to_enterprise;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsExternallyOwned(): bool
    {
        return $this->is_externally_owned;
    }

    /**
     * @param bool $is_externally_owned
     * @return FolderResource
     */
    public function setIsExternallyOwned(bool $is_externally_owned): FolderResource
    {
        $this->is_externally_owned = $is_externally_owned;
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
     * @return FolderResource
     */
    public function setItemCollection(ItemsResource $item_collection): FolderResource
    {
        $this->item_collection = $item_collection;
        return $this;
    }

    /**
     * @return string
     */
    public function getItemStatus(): string
    {
        return $this->item_status;
    }

    /**
     * @param string $item_status
     * @return FolderResource
     */
    public function setItemStatus(string $item_status): FolderResource
    {
        $this->item_status = $item_status;
        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     * @return FolderResource
     */
    public function setMetadata(array $metadata): FolderResource
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * @return UserResource
     */
    public function getModifiedBy(): UserResource
    {
        return $this->modified_by;
    }

    /**
     * @param UserResource $modified_by
     * @return FolderResource
     */
    public function setModifiedBy(UserResource $modified_by): FolderResource
    {
        $this->modified_by = $modified_by;
        return $this;
    }

    /**
     * @return UserResource
     */
    public function getOwnedBy(): UserResource
    {
        return $this->owned_by;
    }

    /**
     * @param UserResource $owned_by
     * @return FolderResource
     */
    public function setOwnedBy(UserResource $owned_by): FolderResource
    {
        $this->owned_by = $owned_by;
        return $this;
    }

    /**
     * @return FolderResource|null
     */
    public function getParent(): ?FolderResource
    {
        return $this->parent;
    }

    /**
     * @param FolderResource|null $parent
     * @return FolderResource
     */
    public function setParent(?FolderResource $parent): FolderResource
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return array
     */
    public function getPathCollection(): array
    {
        return $this->path_collection;
    }

    /**
     * @param array $path_collection
     * @return FolderResource
     */
    public function setPathCollection(array $path_collection): FolderResource
    {
        $this->path_collection = $path_collection;
        return $this;
    }

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     * @return FolderResource
     */
    public function setPermissions(array $permissions): FolderResource
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPurgedAt(): string|null
    {
        return $this->purged_at;
    }

    /**
     * @param string|null $purged_at
     * @return FolderResource
     */
    public function setPurgedAt(string|null $purged_at): FolderResource
    {
        $this->purged_at = $purged_at;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSequenceId(): string|null
    {
        return $this->sequence_id;
    }

    /**
     * @param string|null $sequence_id
     * @return FolderResource
     */
    public function setSequenceId(string|null $sequence_id): FolderResource
    {
        $this->sequence_id = $sequence_id;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getSharedLink(): array|null
    {
        return $this->shared_link;
    }

    /**
     * @param array|null $shared_link
     * @return FolderResource
     */
    public function setSharedLink(array|null $shared_link): FolderResource
    {
        $this->shared_link = $shared_link;
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
     * @return FolderResource
     */
    public function setSyncState(string $sync_state): FolderResource
    {
        $this->sync_state = $sync_state;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return FolderResource
     */
    public function setTags(array $tags): FolderResource
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrashedAt(): string|null
    {
        return $this->trashed_at;
    }

    /**
     * @param string|null $trashed_at
     * @return FolderResource
     */
    public function setTrashedAt(string|null $trashed_at): FolderResource
    {
        $this->trashed_at = $trashed_at;
        return $this;
    }

    /**
     * @return array
     */
    public function getWatermarkInfo(): array
    {
        return $this->watermark_info;
    }

    /**
     * @param array $watermark_info
     * @return FolderResource
     */
    public function setWatermarkInfo(array $watermark_info): FolderResource
    {
        $this->watermark_info = $watermark_info;
        return $this;
    }

    /*** End Getters and Setters ***/

}