<?php

namespace Mitquinn\BoxApiSdk\Resources\Collaborations;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\File;
use Mitquinn\BoxApiSdk\Resources\Folder;
use Mitquinn\BoxApiSdk\Resources\Resource;
use Mitquinn\BoxApiSdk\Resources\User;
use Mitquinn\BoxApiSdk\Resources\WebLinks\WebLink;
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

    /** @var File|Folder|WebLink|null $item */
    protected File|Folder|WebLink|null $item;

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
        $collection = new Collection($response);

        $this->setProperties($collection);

        if ($collection->has('item')) {

            $item = $collection->get('item');

            if (is_null($item)) {
                $this->setItem($item);
            }

            if (array_key_exists('type', $item)) {

                $type = $item['type'];

                if ($type === 'file') {
                    $this->setItem(new File($item));
                }

                if ($type === 'folder') {
                    $this->setItem(new Folder($item));
                }

                if ($type === 'weblink') {
                $this->setItem(new WebLink($item));
                }
            }
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
     * @return File|Folder|WebLink|null
     */
    public function getItem(): File|Folder|null
    {
        return $this->item;
    }

    /**
     * @param File|Folder|WebLink|null $item
     * @return Collaboration
     */
    public function setItem(File|Folder|WebLink|null $item): Collaboration
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