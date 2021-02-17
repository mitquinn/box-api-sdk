<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Adbar\Dot;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasDescription;
use Mitquinn\BoxApiSdk\Traits\Properties\HasETag;
use Mitquinn\BoxApiSdk\Traits\Properties\HasExpiresAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class FileRequestResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class FileRequestResource extends BaseResource
{
    use HasId, HasType, HasCreatedAt, HasCreatedBy, HasDescription, HasETag, HasExpiresAt;

    /** @var FolderResource $folder */
    protected FolderResource $folder;

    /** @var bool $is_description_required */
    protected bool $is_description_required;

    /** @var bool $is_email_required */
    protected bool $is_email_required;

    /** @var string $status */
    protected string $status;

    /** @var string $title */
    protected string $title;

    /** @var string $updated_at */
    protected string $updated_at;

    /** @var UserResource $updated_by */
    protected UserResource $updated_by;

    /** @var string $url */
    protected string $url;

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $dot = new Dot($response);

        if ($dot->has('id')) {
            $this->setId($dot->get('id'));
        }

        if ($dot->has('type')) {
            $this->setType($dot->get('type'));
        }

        if ($dot->has('created_at')) {
            $this->setCreatedAt($dot->get('created_at'));
        }

        if ($dot->has('created_by')) {
            $this->setCreatedBy(new UserResource($dot->get('created_by')));
        }

        if ($dot->has('description')) {
            $this->setDescription($dot->get('description'));
        }

        if ($dot->has('etag')) {
            $this->setEtag($dot->get('etag'));
        }

        if ($dot->has('expires_at')) {
            $this->setExpiresAt($dot->get('expires_at'));
        }

        if ($dot->has('folder')) {
            $this->setFolder(new FolderResource($dot->get('folder')));
        }

        if ($dot->has('is_description_required')) {
            $this->setIsDescriptionRequired($dot->get('is_description_required'));
        }

        if ($dot->has('is_email_required')) {
            $this->setIsEmailRequired($dot->get('is_email_required'));
        }

        if ($dot->has('status')) {
            $this->setStatus($dot->get('status'));
        }

        if ($dot->has('title')) {
            $this->setTitle($dot->get('title'));
        }

        if ($dot->has('updated_at')) {
            $this->setUpdatedAt($dot->get('updated_at'));
        }

        if ($dot->has('updated_by')) {
            $this->setUpdatedBy(new UserResource($dot->get('updated_by')));
        }

        if ($dot->has('url')) {
            $this->setUrl($dot->get('url'));
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return FolderResource
     */
    public function getFolder(): FolderResource
    {
        return $this->folder;
    }

    /**
     * @param FolderResource $folder
     * @return FileRequestResource
     */
    public function setFolder(FolderResource $folder): FileRequestResource
    {
        $this->folder = $folder;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsDescriptionRequired(): bool
    {
        return $this->is_description_required;
    }

    /**
     * @param bool $is_description_required
     * @return FileRequestResource
     */
    public function setIsDescriptionRequired(bool $is_description_required): FileRequestResource
    {
        $this->is_description_required = $is_description_required;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsEmailRequired(): bool
    {
        return $this->is_email_required;
    }

    /**
     * @param bool $is_email_required
     * @return FileRequestResource
     */
    public function setIsEmailRequired(bool $is_email_required): FileRequestResource
    {
        $this->is_email_required = $is_email_required;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return FileRequestResource
     */
    public function setStatus(string $status): FileRequestResource
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return FileRequestResource
     */
    public function setTitle(string $title): FileRequestResource
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     * @return FileRequestResource
     */
    public function setUpdatedAt(string $updated_at): FileRequestResource
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return UserResource
     */
    public function getUpdatedBy(): UserResource
    {
        return $this->updated_by;
    }

    /**
     * @param UserResource $updated_by
     * @return FileRequestResource
     */
    public function setUpdatedBy(UserResource $updated_by): FileRequestResource
    {
        $this->updated_by = $updated_by;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return FileRequestResource
     */
    public function setUrl(string $url): FileRequestResource
    {
        $this->url = $url;
        return $this;
    }

    /*** End Getters and Setters ***/
}
