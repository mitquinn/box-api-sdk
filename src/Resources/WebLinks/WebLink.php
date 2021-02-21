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

        if ($collection->has('id')) {
            $this->setId($collection->get('id'));
        }

        if ($collection->has('type')) {
            $this->setType($collection->get('type'));
        }

        if ($collection->has('created_at')) {
            $this->setCreatedAt($collection->get('created_at'));
        }

        //Todo: Convert to user mini
        if ($collection->has('created_by')) {
            $this->setCreatedBy(new User($collection->get('created_by')));
        }

        if ($collection->has('description')) {
            $this->setDescription($collection->get('description'));
        }

        if ($collection->has('etag')) {
            $this->setEtag($collection->get('etag'));
        }

        if ($collection->has('item_status')) {
            $this->setItemStatus($collection->get('item_status'));
        }

        if ($collection->has('modified_at')) {
            $this->setModifiedAt($collection->get('modified_at'));
        }

        //Todo: Convert to UserMini
        if ($collection->has('modified_by')) {
            $this->setModifiedBy(new User($collection->get('modified_by')));
        }

        if ($collection->has('name')) {
            $this->setName($collection->get('name'));
        }

        if ($collection->has('owned_by')) {
            $this->setOwnedBy(new User($collection->get('owned_by')));
        }

        if ($collection->has('parent')) {
            $this->setParent(new Folder($collection->get('parent')));
        }

        //Todo: Documentation say this should be a Folder mini (seems wrong)
        if ($collection->has('path_collection')) {
            $this->setPathCollection($collection->get('path_collection'));
        }

        if ($collection->has('purged_at')) {
            $this->setPurgedAt($collection->get('purged_at'));
        }

        if ($collection->has('sequence_id')) {
            $this->setSequenceId($collection->get('sequence_id'));
        }

        if ($collection->has('shared_link')) {
            $this->setSharedLink($collection->get('shared_link'));
        }

        if ($collection->has('trashed_at')) {
            $this->setTrashedAt($collection->get('trashed_at'));
        }

        if ($collection->has('url')) {
            $this->setUrl($collection->get('url'));
        }

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