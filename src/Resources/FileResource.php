<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Mitquinn\BoxApiSdk\Traits\Properties\HasAllowedInviteeRoles;
use Mitquinn\BoxApiSdk\Traits\Properties\HasClassification;
use Mitquinn\BoxApiSdk\Traits\Properties\HasExpiresAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasHasCollaborations;
use Mitquinn\BoxApiSdk\Traits\Properties\HasContentCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasContentModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasDescription;
use Mitquinn\BoxApiSdk\Traits\Properties\HasETag;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasItemStatus;
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

class FileResource extends BaseResource
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
        HasHasCollaborations,
        HasId,
        HasItemStatus,
        HasMetadata,
        HasModifiedAt,
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

    //Todo: Make sure to go back and set the default values where they apply  LIKE WITH TYPE
//    /** @var string $type */
//    protected string $type = 'file';

    /** @var int $comment_count */
    protected int $comment_count;

    /** @var array $expiring_embed_link */
    protected array $expiring_embed_link;

    /** @var string $extension */
    protected string $extension;

    //Todo: create FileVersionResource @see https://developer.box.com/reference/resources/file-version--mini/
    /** @var array $file_version */
    protected array $file_version;

    /** @var bool $is_externally_owned */
    protected bool $is_externally_owned;

    /** @var bool $is_package */
    protected bool $is_package;

    /** @var array|null $lock */
    protected array|null $lock;

    /** @var array $representations */
    protected array $representations;

    /** @var string $sha1 */
    protected string $sha1;

    /** @var string $uploader_display_name */
    protected string $uploader_display_name;

    /** @var string $version_number */
    protected string $version_number;

    /**
     * @inheritDoc
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

        if (array_key_exists('classification', $response)) {
            $this->setClassification($response['classification']);
        }

        if (array_key_exists('comment_count', $response)) {
            $this->setCommentCount($response['comment_count']);
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

        if (array_key_exists('expiring_embed_link', $response)) {
            $this->setExpiringEmbedLink($response['expiring_embed_link']);
        }

        if (array_key_exists('extension', $response)) {
            $this->setExtension($response['extension']);
        }

        if (array_key_exists('file_version', $response)) {
            $this->setFileVersion($response['file_version']);
        }

        if (array_key_exists('has_collaborations', $response)) {
            $this->setHasCollaborations($response['has_collaborations']);
        }

        if (array_key_exists('is_externally_owned', $response)) {
            $this->setIsExternallyOwned($response['is_externally_owned']);
        }

        if (array_key_exists('is_package', $response)) {
            $this->setIsPackage($response['is_package']);
        }

        if (array_key_exists('item_status', $response)) {
            $this->setItemStatus($response['item_status']);
        }

        if (array_key_exists('lock', $response)) {
            $this->setLock($response['lock']);
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

        if (array_key_exists('representations', $response)) {
            $this->setRepresentations($response['representations']);
        }

        if (array_key_exists('sequence_id', $response)) {
            $this->setSequenceId($response['sequence_id']);
        }

        if (array_key_exists('sha1', $response)) {
            $this->setSha1($response['sha1']);
        }

        if (array_key_exists('shared_link', $response)) {
            $this->setSharedLink($response['shared_link']);
        }

        if (array_key_exists('size', $response)) {
            $this->setSize($response['size']);
        }

        if (array_key_exists('tags', $response)) {
            $this->setTags($response['tags']);
        }

        if (array_key_exists('trashed_at', $response)) {
            $this->setTrashedAt($response['trashed_at']);
        }

        if (array_key_exists('uploader_display_name', $response)) {
            $this->setUploaderDisplayName($response['uploader_display_name']);
        }

        if (array_key_exists('version_number', $response)) {
            $this->setVersionNumber($response['version_number']);
        }

        if (array_key_exists('watermark_info', $response)) {
            $this->setWatermarkInfo($response['watermark_info']);
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return int
     */
    public function getCommentCount(): int
    {
        return $this->comment_count;
    }

    /**
     * @param int $comment_count
     * @return FileResource
     */
    public function setCommentCount(int $comment_count): FileResource
    {
        $this->comment_count = $comment_count;
        return $this;
    }

    /**
     * @return array
     */
    public function getExpiringEmbedLink(): array
    {
        return $this->expiring_embed_link;
    }

    /**
     * @param array $expiring_embed_link
     * @return FileResource
     */
    public function setExpiringEmbedLink(array $expiring_embed_link): FileResource
    {
        $this->expiring_embed_link = $expiring_embed_link;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     * @return FileResource
     */
    public function setExtension(string $extension): FileResource
    {
        $this->extension = $extension;
        return $this;
    }

    /**
     * @return array
     */
    public function getFileVersion(): array
    {
        return $this->file_version;
    }

    /**
     * @param array $file_version
     * @return FileResource
     */
    public function setFileVersion(array $file_version): FileResource
    {
        $this->file_version = $file_version;
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
     * @return FileResource
     */
    public function setIsExternallyOwned(bool $is_externally_owned): FileResource
    {
        $this->is_externally_owned = $is_externally_owned;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsPackage(): bool
    {
        return $this->is_package;
    }

    /**
     * @param bool $is_package
     * @return FileResource
     */
    public function setIsPackage(bool $is_package): FileResource
    {
        $this->is_package = $is_package;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getLock(): ?array
    {
        return $this->lock;
    }

    /**
     * @param array|null $lock
     * @return FileResource
     */
    public function setLock(?array $lock): FileResource
    {
        $this->lock = $lock;
        return $this;
    }

    /**
     * @return array
     */
    public function getRepresentations(): array
    {
        return $this->representations;
    }

    /**
     * @param array $representations
     * @return FileResource
     */
    public function setRepresentations(array $representations): FileResource
    {
        $this->representations = $representations;
        return $this;
    }

    /**
     * @return string
     */
    public function getSha1(): string
    {
        return $this->sha1;
    }

    /**
     * @param string $sha1
     * @return FileResource
     */
    public function setSha1(string $sha1): FileResource
    {
        $this->sha1 = $sha1;
        return $this;
    }

    /**
     * @return string
     */
    public function getUploaderDisplayName(): string
    {
        return $this->uploader_display_name;
    }

    /**
     * @param string $uploader_display_name
     * @return FileResource
     */
    public function setUploaderDisplayName(string $uploader_display_name): FileResource
    {
        $this->uploader_display_name = $uploader_display_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersionNumber(): string
    {
        return $this->version_number;
    }

    /**
     * @param string $version_number
     * @return FileResource
     */
    public function setVersionNumber(string $version_number): FileResource
    {
        $this->version_number = $version_number;
        return $this;
    }

    /*** End Getters and Setters ***/

}