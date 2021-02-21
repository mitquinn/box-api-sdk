<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

use Mitquinn\BoxApiSdk\Resources\User;

/**
 * Trait HasContentModifiedBy
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasModifiedBy
{
    /** @var User $modified_by */
    protected User $modified_by;

    /**
     * @return User
     */
    public function getModifiedBy(): User
    {
        return $this->modified_by;
    }

    /**
     * @param User $modified_by
     * @return HasModifiedBy
     */
    public function setModifiedBy(User $modified_by): static
    {
        $this->modified_by = $modified_by;
        return $this;
    }
}