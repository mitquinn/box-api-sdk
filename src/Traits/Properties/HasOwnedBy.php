<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

use Mitquinn\BoxApiSdk\Resources\User;

/**
 * Trait HasOwnedBy
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasOwnedBy
{
    /** @var User $owned_by */
    protected User $owned_by;

    /**
     * @return User
     */
    public function getOwnedBy(): User
    {
        return $this->owned_by;
    }

    /**
     * @param User $owned_by
     * @return HasOwnedBy
     */
    public function setOwnedBy(User $owned_by): static
    {
        $this->owned_by = $owned_by;
        return $this;
    }

}