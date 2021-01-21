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
class GroupMembershipResource extends BaseResource
{
    use HasId, HasType, HasCreatedAt, HasModifiedAt;

    /** @var GroupResource $group */
    protected GroupResource $group;

    /** @var string $role */
    protected string $role;

    /** @var UserResource $user */
    protected UserResource $user;

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
            $this->setGroup(new GroupResource($response['group']));
        }

        if (array_key_exists('modified_at', $response)) {
            $this->setModifiedAt($response['modified_at']);
        }

        if (array_key_exists('role', $response)) {
            $this->setRole($response['role']);
        }

        if (array_key_exists('user', $response)) {
            $this->setUser(new UserResource($response['user']));
        }

        return $this;
    }



    /*** Start Getters and Setters ***/

    /**
     * @return GroupResource
     */
    public function getGroup(): GroupResource
    {
        return $this->group;
    }

    /**
     * @param GroupResource $group
     * @return GroupMembershipResource
     */
    public function setGroup(GroupResource $group): GroupMembershipResource
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
     * @return GroupMembershipResource
     */
    public function setRole(string $role): GroupMembershipResource
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return UserResource
     */
    public function getUser(): UserResource
    {
        return $this->user;
    }

    /**
     * @param UserResource $user
     * @return GroupMembershipResource
     */
    public function setUser(UserResource $user): GroupMembershipResource
    {
        $this->user = $user;
        return $this;
    }

    /*** End Getters and Setters ***/

}