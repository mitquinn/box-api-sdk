<?php

namespace Mitquinn\BoxApiSdk\Resources\WebLinks;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\Folder;
use Mitquinn\BoxApiSdk\Resources\Resource;
use Mitquinn\BoxApiSdk\Resources\User;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasDescription;
use Mitquinn\BoxApiSdk\Traits\Properties\HasETag;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasName;
use Mitquinn\BoxApiSdk\Traits\Properties\HasOwnedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasParent;
use Mitquinn\BoxApiSdk\Traits\Properties\HasPathCollection;
use Mitquinn\BoxApiSdk\Traits\Properties\HasPurgedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasSequenceId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasSharedLink;
use Mitquinn\BoxApiSdk\Traits\Properties\HasTrashedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class WebLinkFullResource
 * @package Mitquinn\BoxApiSdk\Resources\WebLinks
 */
class WebLink extends Resource
{
    use HasId,
        HasType,
        HasCreatedAt,
        HasCreatedBy,
        HasDescription,
        HasETag,
        HasModifiedAt,
        HasModifiedBy,
        HasName,
        HasOwnedBy,
        HasParent,
        HasPathCollection,
        HasPurgedAt,
        HasSequenceId,
        HasSharedLink,
        HasTrashedAt;

    /** @var string $item_status */
    protected string $item_status;

    /** @var string $url */
    protected string $url;

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
     * @return string
     */
    public function getItemStatus(): string
    {
        return $this->item_status;
    }

    /**
     * @param string $item_status
     * @return WebLink
     */
    public function setItemStatus(string $item_status): WebLink
    {
        $this->item_status = $item_status;
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
     * @return WebLink
     */
    public function setUrl(string $url): WebLink
    {
        $this->url = $url;
        return $this;
    }

    /*** End Getters and Setters ***/

}