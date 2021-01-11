<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

use Mitquinn\BoxApiSdk\Resources\UserResource;

/**
 * Trait HasContentModifiedBy
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasModifiedBy
{
    /** @var UserResource $modified_by */
    protected UserResource $modified_by;

    /**
     * @return UserResource
     */
    public function getModifiedBy(): UserResource
    {
        return $this->modified_by;
    }

    /**
     * @param UserResource $modified_by
     * @return HasModifiedBy
     */
    public function setModifiedBy(UserResource $modified_by): static
    {
        $this->modified_by = $modified_by;
        return $this;
    }
}