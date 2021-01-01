<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasCreatedAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasCreatedAt
{
    /** @var string|null $created_at */
    protected string|null $created_at;

    /**
     * @return string|null
     */
    public function getCreatedAt(): string|null
    {
        return $this->created_at;
    }

    /**
     * @param string|null $created_at
     * @return HasCreatedAt
     */
    public function setCreatedAt(string|null $created_at): static
    {
        $this->created_at = $created_at;
        return $this;
    }


}