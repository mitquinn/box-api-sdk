<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasExpiresAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasExpiresAt
{
    /** @var string|null $expires_at */
    protected string|null $expires_at;

    /**
     * @return string|null
     */
    public function getExpiresAt(): ?string
    {
        return $this->expires_at;
    }

    /**
     * @param string|null $expires_at
     * @return HasExpiresAt
     */
    public function setExpiresAt(?string $expires_at): static
    {
        $this->expires_at = $expires_at;
        return $this;
    }

}