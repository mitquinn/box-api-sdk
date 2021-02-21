<?php

namespace Mitquinn\BoxApiSdk\Api;

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
use Mitquinn\BoxApiSdk\Resources\GroupMembership;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GroupMembersCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class GroupMemberships extends Api
{

    /**
     * @param GenericRequest|GetGroupMembershipRequest $request
     * @return GroupMembership
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getGroupMembership(GenericRequest|GetGroupMembershipRequest $request): GroupMembership
    {
        return $this->sendGroupMembershipRequest($request);
    }

    /**
     * @param GenericRequest|AddUserToGroupRequest $request
     * @return GroupMembership
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function addUserToGroup(GenericRequest|AddUserToGroupRequest $request): GroupMembership
    {
        return $this->sendGroupMembershipRequest($request);
    }

    /**
     * @param GenericRequest|UpdateGroupMembershipRequest $request
     * @return GroupMembership
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateGroupMembership(GenericRequest|UpdateGroupMembershipRequest $request): GroupMembership
    {
        return $this->sendGroupMembershipRequest($request);
    }

    /**
     * @param GenericRequest|RemoveUserFromGroupRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeUserFromGroup(GenericRequest|RemoveUserFromGroupRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }






}