<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\GroupMemberships\AddUserToGroupRequest;
use Mitquinn\BoxApiSdk\Requests\GroupMemberships\GetGroupMembershipRequest;
use Mitquinn\BoxApiSdk\Requests\GroupMemberships\RemoveUserFromGroupRequest;
use Mitquinn\BoxApiSdk\Requests\GroupMemberships\UpdateGroupMembershipRequest;
use Mitquinn\BoxApiSdk\Resources\GroupMembershipResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GroupMembersCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class GroupMembershipsCollection extends BaseCollection
{

    /**
     * @param int $id
     * @param array $query
     * @param GetGroupMembershipRequest|null $getGroupMembershipRequest
     * @return GroupMembershipResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getGroupMembership(int $id, array $query = [], GetGroupMembershipRequest $getGroupMembershipRequest = null): GroupMembershipResource
    {
        if (is_null($getGroupMembershipRequest)) {
            $getGroupMembershipRequest = new GetGroupMembershipRequest(id: $id, query: $query);
        }

        return $this->sendGroupMembershipRequest($getGroupMembershipRequest);

    }

    /**
     * @param array $body
     * @param array $query
     * @param AddUserToGroupRequest|null $addUserToGroupRequest
     * @return GroupMembershipResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function addUserToGroup(array $body, array $query = [], AddUserToGroupRequest $addUserToGroupRequest = null): GroupMembershipResource
    {
        if (is_null($addUserToGroupRequest)) {
            $addUserToGroupRequest = new AddUserToGroupRequest(body: $body, query: $query);
        }

        return $this->sendGroupMembershipRequest($addUserToGroupRequest);
    }

    /**
     * @param int $id
     * @param array $query
     * @param array $body
     * @param UpdateGroupMembershipRequest|null $updateGroupMembershipRequest
     * @return GroupMembershipResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateGroupMembership(int $id, array $query = [], array $body = [], UpdateGroupMembershipRequest $updateGroupMembershipRequest = null): GroupMembershipResource
    {
        if (is_null($updateGroupMembershipRequest)) {
            $updateGroupMembershipRequest = new UpdateGroupMembershipRequest(id: $id, query: $query, body: $body);
        }

        return $this->sendGroupMembershipRequest($updateGroupMembershipRequest);
    }

    /**
     * @param int $id
     * @param RemoveUserFromGroupRequest|null $removeUserFromGroupRequest
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeUserFromGroup(int $id, RemoveUserFromGroupRequest $removeUserFromGroupRequest = null): NoContentResource
    {
        if (is_null($removeUserFromGroupRequest)) {
            $removeUserFromGroupRequest = new RemoveUserFromGroupRequest(id: $id);
        }

        return $this->sendNoContentRequest($removeUserFromGroupRequest);
    }






}