<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\GroupMemberships\AddUserToGroupRequest;
use Mitquinn\BoxApiSdk\Requests\GroupMemberships\GetGroupMembershipRequest;
use Mitquinn\BoxApiSdk\Requests\GroupMemberships\RemoveUserFromGroupRequest;
use Mitquinn\BoxApiSdk\Requests\GroupMemberships\UpdateGroupMembershipRequest;
use Mitquinn\BoxApiSdk\Requests\Users\GetCurrentUserRequest;
use Mitquinn\BoxApiSdk\Resources\GroupMembership;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GroupMembershipsCollection
 * @package Mitquinn\BoxApiSdk\Tests\Api\Collections
 */
class GroupMembershipsApiTest extends BaseTest
{


    /**
     * @return GroupMembership
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function createGroupMembership(): GroupMembership
    {
        $groupResource = $this->createGroup();
        $request = new GetCurrentUserRequest();
        $userResource = $this->getBoxService()->users()->getCurrentUser($request);
        $body = [
            'group' => [
                'id' => $groupResource->getId()
            ],
            'user' => [
                'id' => $userResource->getId()
            ]
        ];

        $requestAdd = new AddUserToGroupRequest($body);
        $groupMembershipResource = $this->getBoxService()->groupMemberships()->addUserToGroup($requestAdd);
        static::assertInstanceOf(GroupMembership::class, $groupMembershipResource);
        return $groupMembershipResource;
    }

    public function testGetGroupMembership()
    {
        $groupMembershipResourceCreated = $this->createGroupMembership();
        $request = new GetGroupMembershipRequest($groupMembershipResourceCreated->getId());
        $groupMembershipResource = $this->getBoxService()->groupMemberships()->getGroupMembership($request);
        static::assertInstanceOf(GroupMembership::class, $groupMembershipResource);
        $this->removeGroup($groupMembershipResource->getGroup()->getId());
    }


    public function testAddUserToGroup()
    {
        $groupResource = $this->createGroup();
        $currentUserRequest = new GetCurrentUserRequest();
        $userResource = $this->getBoxService()->users()->getCurrentUser($currentUserRequest);
        $body = [
            'group' => [
                'id' => $groupResource->getId()
            ],
            'user' => [
                'id' => $userResource->getId()
            ]
        ];

        $request = new AddUserToGroupRequest(body: $body);
        $groupMembershipResource = $this->getBoxService()->groupMemberships()->addUserToGroup($request);
        static::assertInstanceOf(GroupMembership::class, $groupMembershipResource);
        $this->removeGroup($groupMembershipResource->getGroup()->getId());
    }

    public function testUpdateGroupMembership()
    {
        $groupMembershipResource = $this->createGroupMembership();
        $request = new UpdateGroupMembershipRequest($groupMembershipResource->getId());
        $updatedGroupMembershipResource = $this->getBoxService()->groupMemberships()->updateGroupMembership($request);
        static::assertInstanceOf(GroupMembership::class, $updatedGroupMembershipResource);
        $this->removeGroup($groupMembershipResource->getGroup()->getId());
    }


    public function testRemoveUserFromGroup()
    {
        $groupMembershipResource = $this->createGroupMembership();
        $request = new RemoveUserFromGroupRequest($groupMembershipResource->getId());
        $noContentResource = $this->getBoxService()->groupMemberships()->removeUserFromGroup($request);
        static::assertInstanceOf(NoContent::class, $noContentResource);
        $this->removeGroup($groupMembershipResource->getGroup()->getId());
    }


}