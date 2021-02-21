<?php

namespace Mitquinn\BoxApiSdk\Resources\WebLinks;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\Resource;
use Mitquinn\BoxApiSdk\Traits\Properties\HasETag;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasName;
use Mitquinn\BoxApiSdk\Traits\Properties\HasSequenceId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class WebLinkMiniResource
 * @package Mitquinn\BoxApiSdk\Resources\WebLinks
 */
class WebLinkMini extends Resource
{
    use HasId, HasType, HasETag, HasName, HasSequenceId;

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

        if ($collection->has('etag')) {
            $this->setEtag($collection->get('etag'));
        }

        if ($collection->has('name')) {
            $this->setName($collection->get('name'));
        }

        if ($collection->has('sequence_id')) {
            $this->setSequenceId($collection->get('sequence_id'));
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return WebLinkMini
     */
    public function setUrl(string $url): WebLinkMini
    {
        $this->url = $url;
        return $this;
    }

    /*** End Getters and Setters ***/

}