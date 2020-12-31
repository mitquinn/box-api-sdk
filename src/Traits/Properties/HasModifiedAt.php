<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasModifiedAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasModifiedAt
{
    protected string $modified_at;

    /**
     * @return string
     */
    public function getModifiedAt(): string
    {
        return $this->modified_at;
    }

    /**
     * @param string $modified_at
     * @return HasModifiedAt
     */
    public function setModifiedAt(string $modified_at): static
    {
        $this->modified_at = $modified_at;
        return $this;
    }
}