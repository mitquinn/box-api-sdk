<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasContentCreatedAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasContentCreatedAt
{
    /** @var string|null $content_created_at */
    protected string|null $content_created_at;

    /**
     * @return string|null
     */
    public function getContentCreatedAt(): ?string
    {
        return $this->content_created_at;
    }

    /**
     * @param string|null $content_created_at
     * @return HasContentCreatedAt
     */
    public function setContentCreatedAt(?string $content_created_at): static
    {
        $this->content_created_at = $content_created_at;
        return $this;
    }

}