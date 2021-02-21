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
class FileRequest extends Resource
{
    use HasId, HasType, HasCreatedAt, HasCreatedBy, HasDescription, HasETag, HasExpiresAt;

    /** @var Folder $folder */
    protected Folder $folder;

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

    /** @var User $updated_by */
    protected User $updated_by;

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
            $this->setCreatedBy(new User($dot->get('created_by')));
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
            $this->setFolder(new Folder($dot->get('folder')));
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
            $this->setUpdatedBy(new User($dot->get('updated_by')));
        }

        if ($dot->has('url')) {
            $this->setUrl($dot->get('url'));
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return Folder
     */
    public function getFolder(): Folder
    {
        return $this->folder;
    }

    /**
     * @param Folder $folder
     * @return FileRequest
     */
    public function setFolder(Folder $folder): FileRequest
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
     * @return FileRequest
     */
    public function setIsDescriptionRequired(bool $is_description_required): FileRequest
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
     * @return FileRequest
     */
    public function setIsEmailRequired(bool $is_email_required): FileRequest
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
     * @return FileRequest
     */
    public function setStatus(string $status): FileRequest
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
     * @return FileRequest
     */
    public function setTitle(string $title): FileRequest
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
     * @return FileRequest
     */
    public function setUpdatedAt(string $updated_at): FileRequest
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return User
     */
    public function getUpdatedBy(): User
    {
        return $this->updated_by;
    }

    /**
     * @param User $updated_by
     * @return FileRequest
     */
    public function setUpdatedBy(User $updated_by): FileRequest
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
     * @return FileRequest
     */
    public function setUrl(string $url): FileRequest
    {
        $this->url = $url;
        return $this;
    }

    /*** End Getters and Setters ***/
}
