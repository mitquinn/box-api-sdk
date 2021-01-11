<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasPermissions
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasPermissions
{
    /** @var array $permissions */
    protected array $permissions;

    /**
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     * @return HasPermissions
     */
    public function setPermissions(array $permissions): static
    {
        $this->permissions = $permissions;
        return $this;
    }

}