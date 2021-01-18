<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasDescription;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasName;
use Mitquinn\BoxApiSdk\Traits\Properties\HasPermissions;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class GroupResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class GroupResource extends BaseResource
{
    use HasId, HasType, HasCreatedAt, HasDescription, HasModifiedAt, HasName, HasPermissions;

    /** @var string $external_sync_identifier */
    protected string $external_sync_identifier;

    /** @var string $group_type */
    protected string $group_type;

    /** @var string $invitability_level */
    protected string $invitability_level;

    /** @var string $member_viewability_level */
    protected string $member_viewability_level;

    /** @var string $provenance */
    protected string $provenance;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        if (array_key_exists('id', $response)) {
            $this->setId($response['id']);
        }

        if (array_key_exists('type', $response)) {
            $this->setType($response['type']);
        }

        if (array_key_exists('created_at', $response)) {
            $this->setCreatedAt($response['created_at']);
        }

        if (array_key_exists('description', $response)) {
            $this->setDescription($response['description']);
        }

        if (array_key_exists('external_sync_identifier', $response)) {
            $this->setExternalSyncIdentifier($response['external_sync_identifier']);
        }

        if (array_key_exists('group_type', $response)) {
            $this->setGroupType($response['group_type']);
        }

        if (array_key_exists('invitability_level', $response)) {
            $this->setInvitabilityLevel($response['invitability_level']);
        }

        if (array_key_exists('member_viewability_level', $response)) {
            $this->setMemberViewabilityLevel($response['member_viewability_level']);
        }

        if (array_key_exists('modified_at', $response)) {
            $this->setModifiedAt($response['modified_at']);
        }

        if (array_key_exists('name', $response)) {
            $this->setName($response['name']);
        }

        if (array_key_exists('permissions', $response)) {
            $this->setPermissions($response['permissions']);
        }

        if (array_key_exists('provenance', $response)) {
            $this->setProvenance($response['provenance']);
        }

        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getExternalSyncIdentifier(): string
    {
        return $this->external_sync_identifier;
    }

    /**
     * @param string $external_sync_identifier
     * @return GroupResource
     */
    public function setExternalSyncIdentifier(string $external_sync_identifier): GroupResource
    {
        $this->external_sync_identifier = $external_sync_identifier;
        return $this;
    }

    /**
     * @return string
     */
    public function getGroupType(): string
    {
        return $this->group_type;
    }

    /**
     * @param string $group_type
     * @return GroupResource
     */
    public function setGroupType(string $group_type): GroupResource
    {
        $this->group_type = $group_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvitabilityLevel(): string
    {
        return $this->invitability_level;
    }

    /**
     * @param string $invitability_level
     * @return GroupResource
     */
    public function setInvitabilityLevel(string $invitability_level): GroupResource
    {
        $this->invitability_level = $invitability_level;
        return $this;
    }

    /**
     * @return string
     */
    public function getMemberViewabilityLevel(): string
    {
        return $this->member_viewability_level;
    }

    /**
     * @param string $member_viewability_level
     * @return GroupResource
     */
    public function setMemberViewabilityLevel(string $member_viewability_level): GroupResource
    {
        $this->member_viewability_level = $member_viewability_level;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvenance(): string
    {
        return $this->provenance;
    }

    /**
     * @param string $provenance
     * @return GroupResource
     */
    public function setProvenance(string $provenance): GroupResource
    {
        $this->provenance = $provenance;
        return $this;
    }

    /*** End Getters and Setters ***/

}