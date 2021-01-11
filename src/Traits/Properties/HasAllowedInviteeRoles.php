<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasAllowedInviteeRoles
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasAllowedInviteeRoles
{

    /** @var array $allowed_invitee_roles */
    protected array $allowed_invitee_roles;

    /**
     * @return array
     */
    public function getAllowedInviteeRoles(): array
    {
        return $this->allowed_invitee_roles;
    }

    /**
     * @param array $allowed_invitee_roles
     * @return HasAllowedInviteeRoles
     */
    public function setAllowedInviteeRoles(array $allowed_invitee_roles): static
    {
        $this->allowed_invitee_roles = $allowed_invitee_roles;
        return $this;
    }

}