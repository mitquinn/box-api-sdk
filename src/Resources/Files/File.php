<?php

namespace Mitquinn\BoxApiSdk\Resources\Files;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\Resource;
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

/**
 * Class File
 * @package Mitquinn\BoxApiSdk\Resources\Files
 */
class File extends Resource
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
        $collection = new Collection($response);

        $this->setProperties($collection);

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
     * @return File
     */
    public function setCommentCount(int $comment_count): File
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
     * @return File
     */
    public function setExpiringEmbedLink(array $expiring_embed_link): File
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
     * @return File
     */
    public function setExtension(string $extension): File
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
     * @return File
     */
    public function setFileVersion(array $file_version): File
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
     * @return File
     */
    public function setIsExternallyOwned(bool $is_externally_owned): File
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
     * @return File
     */
    public function setIsPackage(bool $is_package): File
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
     * @return File
     */
    public function setLock(?array $lock): File
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
     * @return File
     */
    public function setRepresentations(array $representations): File
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
     * @return File
     */
    public function setSha1(string $sha1): File
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
     * @return File
     */
    public function setUploaderDisplayName(string $uploader_display_name): File
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
     * @return File
     */
    public function setVersionNumber(string $version_number): File
    {
        $this->version_number = $version_number;
        return $this;
    }

    /*** End Getters and Setters ***/

}