<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
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
     * @param GenericRequest|GetGroupMembershipRequest $request
     * @return GroupMembershipResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getGroupMembership(GenericRequest|GetGroupMembershipRequest $request): GroupMembershipResource
    {
        return $this->sendGroupMembershipRequest($request);
    }

    /**
     * @param GenericRequest|AddUserToGroupRequest $request
     * @return GroupMembershipResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function addUserToGroup(GenericRequest|AddUserToGroupRequest $request): GroupMembershipResource
    {
        return $this->sendGroupMembershipRequest($request);
    }

    /**
     * @param GenericRequest|UpdateGroupMembershipRequest $request
     * @return GroupMembershipResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateGroupMembership(GenericRequest|UpdateGroupMembershipRequest $request): GroupMembershipResource
    {
        return $this->sendGroupMembershipRequest($request);
    }

    /**
     * @param GenericRequest|RemoveUserFromGroupRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeUserFromGroup(GenericRequest|RemoveUserFromGroupRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }






}