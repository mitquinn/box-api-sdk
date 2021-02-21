<?php


namespace Mitquinn\BoxApiSdk\Resources;


use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasModifiedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class GroupMembershipResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class GroupMembership extends Resource
{
    use HasId, HasType, HasCreatedAt, HasModifiedAt;

    /** @var Group $group */
    protected Group $group;

    /** @var string $role */
    protected string $role;

    /** @var User $user */
    protected User $user;

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

        if (array_key_exists('group', $response)) {
            $this->setGroup(new Group($response['group']));
        }

        if (array_key_exists('modified_at', $response)) {
            $this->setModifiedAt($response['modified_at']);
        }

        if (array_key_exists('role', $response)) {
            $this->setRole($response['role']);
        }

        if (array_key_exists('user', $response)) {
            $this->setUser(new User($response['user']));
        }

        return $this;
    }



    /*** Start Getters and Setters ***/

    /**
     * @return Group
     */
    public function getGroup(): Group
    {
        return $this->group;
    }

    /**
     * @param Group $group
     * @return GroupMembership
     */
    public function setGroup(Group $group): GroupMembership
    {
        $this->group = $group;
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
     * @return GroupMembership
     */
    public function setRole(string $role): GroupMembership
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return GroupMembership
     */
    public function setUser(User $user): GroupMembership
    {
        $this->user = $user;
        return $this;
    }

    /*** End Getters and Setters ***/

}