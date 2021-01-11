<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasETag
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasETag
{

    protected string|null $etag;

    /**
     * @return string|null
     */
    public function getEtag(): ?string
    {
        return $this->etag;
    }

    /**
     * @param string|null $etag
     * @return HasETag
     */
    public function setEtag(?string $etag): static
    {
        $this->etag = $etag;
        return $this;
    }

}