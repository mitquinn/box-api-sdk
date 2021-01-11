<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

use Mitquinn\BoxApiSdk\Resources\UserResource;

/**
 * Trait HasCreatedBy
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasCreatedBy
{
    /** @var UserResource $created_by */
    protected UserResource $created_by;

    /**
     * @return UserResource
     */
    public function getCreatedBy(): UserResource
    {
        return $this->created_by;
    }

    /**
     * @param UserResource $created_by
     * @return HasCreatedBy
     */
    public function setCreatedBy(UserResource $created_by): static
    {
        $this->created_by = $created_by;
        return $this;
    }

}