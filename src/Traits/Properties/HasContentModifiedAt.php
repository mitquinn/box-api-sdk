<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasContentModifiedAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasContentModifiedAt
{
    /** @var string|null $content_modified_at */
    protected string|null $content_modified_at;

    /**
     * @return string|null
     */
    public function getContentModifiedAt(): ?string
    {
        return $this->content_modified_at;
    }

    /**
     * @param string|null $content_modified_at
     * @return HasContentModifiedAt
     */
    public function setContentModifiedAt(?string $content_modified_at): static
    {
        $this->content_modified_at = $content_modified_at;
        return $this;
    }
}