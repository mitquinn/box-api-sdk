<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasPurgedAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasPurgedAt
{

    protected string|null $purged_at;

    /**
     * @return string|null
     */
    public function getPurgedAt(): ?string
    {
        return $this->purged_at;
    }

    /**
     * @param string|null $purged_at
     * @return HasPurgedAt
     */
    public function setPurgedAt(?string $purged_at): static
    {
        $this->purged_at = $purged_at;
        return $this;
    }

}