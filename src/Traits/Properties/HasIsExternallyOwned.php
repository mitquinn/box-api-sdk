<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasIsExternallyOwned
 * @package Mitquinn\BoxApiSdk\Traits\Properties
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