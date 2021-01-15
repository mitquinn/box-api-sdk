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
class CollaborationResource extends BaseResource
{
    use HasId, HasType, HasCreatedAt, HasCreatedBy, HasExpiresAt, HasModifiedAt;

    /** @var array $acceptance_requirements_status */
    protected array $acceptance_requirements_status;

    /** @var UserResource $accessible_by */
    protected UserResource $accessible_by;

    /** @var string $acknowledged_at */
    protected string $acknowledged_at;

    /** @var string|null $invite_email */
    protected string|null $invite_email;

    //Todo: Need to add weblink here as well.
    /** @var FileResource|FolderResource|null $item */
    protected FileResource|FolderResource|null $item;

    /** @var string $role */
    protected string $role;

    /** @var string $status */
    protected string $status;

    /**
     * @param array $response
     * @return CollaborationResource
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
            $this->setAccessibleBy(new UserResource($response['accessible_by']));
        }

        if (array_key_exists('acknowledged_at', $response)) {
            $this->setAcknowledgedAt($response['acknowledged_at']);
        }

        if (array_key_exists('created_at', $response)) {
            $this->setCreatedAt($response['created_at']);
        }

        if (array_key_exists('created_by', $response)) {
            $this->setCreatedBy(new UserResource($response['created_by']));
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
                    $this->setItem(new FileResource($response['item']));
                }

                if ($response['item']['type'] === 'folder') {
                    $this->setItem(new FolderResource($response['item']));
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
     * @return CollaborationResource
     */
    public function setAcceptanceRequirementsStatus(array $acceptance_requirements_status): CollaborationResource
    {
        $this->acceptance_requirements_status = $acceptance_requirements_status;
        return $this;
    }

    /**
     * @return UserResource
     */
    public function getAccessibleBy(): UserResource
    {
        return $this->accessible_by;
    }

    /**
     * @param UserResource $accessible_by
     * @return CollaborationResource
     */
    public function setAccessibleBy(UserResource $accessible_by): CollaborationResource
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
     * @return CollaborationResource
     */
    public function setAcknowledgedAt(string $acknowledged_at): CollaborationResource
    {
        $this->acknowledged_at = $acknowledged_at;
        return $this;
    }

    /**
     * @return FileResource|FolderResource|null
     */
    public function getItem(): FileResource|FolderResource|null
    {
        return $this->item;
    }

    /**
     * @param FileResource|FolderResource|null $item
     * @return CollaborationResource
     */
    public function setItem(FileResource|FolderResource|null $item): CollaborationResource
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
     * @return CollaborationResource
     */
    public function setInviteEmail(?string $invite_email): CollaborationResource
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
     * @return CollaborationResource
     */
    public function setRole(string $role): CollaborationResource
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
     * @return CollaborationResource
     */
    public function setStatus(string $status): CollaborationResource
    {
        $this->status = $status;
        return $this;
    }

    /*** End Getters and Setters  ***/

}