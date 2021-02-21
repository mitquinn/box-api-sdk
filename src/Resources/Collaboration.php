<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasExpiresAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class CollaborationResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class Collaboration extends Resource
{
    use HasId, HasType, HasCreatedAt, HasCreatedBy, HasExpiresAt, HasModifiedAt;

    /** @var array $acceptance_requirements_status */
    protected array $acceptance_requirements_status;

    /** @var User $accessible_by */
    protected User $accessible_by;

    /** @var string $acknowledged_at */
    protected string $acknowledged_at;

    /** @var string|null $invite_email */
    protected string|null $invite_email;

    //Todo: Need to add weblink here as well.
    /** @var File|Folder|null $item */
    protected File|Folder|null $item;

    /** @var string $role */
    protected string $role;

    /** @var string $status */
    protected string $status;

    /**
     * @param array $response
     * @return Collaboration
     */
    protected function mapResource(array $response): static
    {
        if (array_key_exists('id', $response)) {
            $this->setId($response['id']);
        }

        if (array_key_exists('type', $response)) {
            $this->setType($response['type']);
        }

        if (array_key_exists('acceptance_requirements_status', $response)) {
            $this->setAcceptanceRequirementsStatus($response['acceptance_requirements_status']);
        }

        if (array_key_exists('accessible_by', $response)) {
            $this->setAccessibleBy(new User($response['accessible_by']));
        }

        if (array_key_exists('acknowledged_at', $response)) {
            $this->setAcknowledgedAt($response['acknowledged_at']);
        }

        if (array_key_exists('created_at', $response)) {
            $this->setCreatedAt($response['created_at']);
        }

        if (array_key_exists('created_by', $response)) {
            $this->setCreatedBy(new User($response['created_by']));
        }

        if (array_key_exists('expires_at', $response)) {
            $this->setExpiresAt($response['expires_at']);
        }

        if (array_key_exists('invite_email', $response)) {
            $this->setInviteEmail($response['invite_email']);
        }

        if (array_key_exists('item', $response)) {
            if (is_null($response['item'])) {
                $this->setItem($response['item']);
            }

            if (array_key_exists('type', $response['item'])) {

                if ($response['item']['type'] === 'file') {
                    $this->setItem(new File($response['item']));
                }

                if ($response['item']['type'] === 'folder') {
                    $this->setItem(new Folder($response['item']));
                }

                //Todo: Add weblink here
                //if ($response['item']['type'] === 'weblink') {
                //$this->setItem(new WeblinkResource($response['item']));
                //}
            }
        }

        if (array_key_exists('modified_at', $response)) {
            $this->setModifiedAt($response['modified_at']);
        }

        if (array_key_exists('role', $response)) {
            $this->setRole($response['role']);
        }

        if (array_key_exists('status', $response)) {
            $this->setStatus($response['status']);
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return array
     */
    public function getAcceptanceRequirementsStatus(): array
    {
        return $this->acceptance_requirements_status;
    }

    /**
     * @param array $acceptance_requirements_status
     * @return Collaboration
     */
    public function setAcceptanceRequirementsStatus(array $acceptance_requirements_status): Collaboration
    {
        $this->acceptance_requirements_status = $acceptance_requirements_status;
        return $this;
    }

    /**
     * @return User
     */
    public function getAccessibleBy(): User
    {
        return $this->accessible_by;
    }

    /**
     * @param User $accessible_by
     * @return Collaboration
     */
    public function setAccessibleBy(User $accessible_by): Collaboration
    {
        $this->accessible_by = $accessible_by;
        return $this;
    }

    /**
     * @return string
     */
    public function getAcknowledgedAt(): string
    {
        return $this->acknowledged_at;
    }

    /**
     * @param string $acknowledged_at
     * @return Collaboration
     */
    public function setAcknowledgedAt(string $acknowledged_at): Collaboration
    {
        $this->acknowledged_at = $acknowledged_at;
        return $this;
    }

    /**
     * @return File|Folder|null
     */
    public function getItem(): File|Folder|null
    {
        return $this->item;
    }

    /**
     * @param File|Folder|null $item
     * @return Collaboration
     */
    public function setItem(File|Folder|null $item): Collaboration
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInviteEmail(): ?string
    {
        return $this->invite_email;
    }

    /**
     * @param string|null $invite_email
     * @return Collaboration
     */
    public function setInviteEmail(?string $invite_email): Collaboration
    {
        $this->invite_email = $invite_email;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return Collaboration
     */
    public function setRole(string $role): Collaboration
    {
        $this->role = $role;
        return $this;
    }


    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Collaboration
     */
    public function setStatus(string $status): Collaboration
    {
        $this->status = $status;
        return $this;
    }

    /*** End Getters and Setters  ***/

}