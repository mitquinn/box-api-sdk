<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasCreatedAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasCreatedAt
{
    /** @var string $created_at */
    protected string $created_at;

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return HasCreatedAt
     */
    public function setCreatedAt(string $created_at): static
    {
        $this->created_at = $created_at;
        return $this;
    }


}