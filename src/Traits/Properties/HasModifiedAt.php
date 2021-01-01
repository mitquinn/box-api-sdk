<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasModifiedAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasModifiedAt
{
    protected string|null $modified_at;

    /**
     * @return string|null
     */
    public function getModifiedAt(): string|null
    {
        return $this->modified_at;
    }

    /**
     * @param string|null $modified_at
     * @return HasModifiedAt
     */
    public function setModifiedAt(string|null $modified_at): static
    {
        $this->modified_at = $modified_at;
        return $this;
    }
}