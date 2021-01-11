<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasTrashedAt
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasTrashedAt
{
    /** @var string|null $trashed_at */
    protected string|null $trashed_at;

    /**
     * @return string|null
     */
    public function getTrashedAt(): ?string
    {
        return $this->trashed_at;
    }

    /**
     * @param string|null $trashed_at
     * @return HasTrashedAt
     */
    public function setTrashedAt(?string $trashed_at): static
    {
        $this->trashed_at = $trashed_at;
        return $this;
    }

}