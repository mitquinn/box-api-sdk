<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Trait HasIsExternallyOwned
 * @package Mitquinn\BoxApiSdk\Resources
 */
trait HasIsExternallyOwned
{
    /** @var bool $is_externally_owned */
    protected bool $is_externally_owned;

    /**
     * @return bool
     */
    public function isIsExternallyOwned(): bool
    {
        return $this->is_externally_owned;
    }

    /**
     * @param bool $is_externally_owned
     * @return HasIsExternallyOwned
     */
    public function setIsExternallyOwned(bool $is_externally_owned): static
    {
        $this->is_externally_owned = $is_externally_owned;
        return $this;
    }

}