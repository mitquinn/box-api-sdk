<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

use Mitquinn\BoxApiSdk\Resources\User;

/**
 * Trait HasCreatedBy
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasCreatedBy
{
    /** @var User $created_by */
    protected User $created_by;

    /**
     * @return User
     */
    public function getCreatedBy(): User
    {
        return $this->created_by;
    }

    /**
     * @param User $created_by
     * @return HasCreatedBy
     */
    public function setCreatedBy(User $created_by): static
    {
        $this->created_by = $created_by;
        return $this;
    }

}