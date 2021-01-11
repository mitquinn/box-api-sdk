<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

use Mitquinn\BoxApiSdk\Resources\UserResource;

/**
 * Trait HasOwnedBy
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasOwnedBy
{
    /** @var UserResource $owned_by */
    protected UserResource $owned_by;

    /**
     * @return UserResource
     */
    public function getOwnedBy(): UserResource
    {
        return $this->owned_by;
    }

    /**
     * @param UserResource $owned_by
     * @return HasOwnedBy
     */
    public function setOwnedBy(UserResource $owned_by): static
    {
        $this->owned_by = $owned_by;
        return $this;
    }

}