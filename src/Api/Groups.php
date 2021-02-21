<?php

namespace Mitquinn\BoxApiSdk\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\CreateGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\GetGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\ListGroupCollaborationsRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\ListGroupsForEnterpriseRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\ListMembersOfGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\RemoveGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\UpdateGroupRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\GroupMembershipsResource;
use Mitquinn\BoxApiSdk\Resources\Group;
use Mitquinn\BoxApiSdk\Resources\GroupsResource;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GroupsCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class Groups extends Api
{

    /**
     * @param GenericRequest|ListGroupsForEnterpriseRequest $request
     * @return GroupsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listGroupsForEnterprise(GenericRequest|ListGroupsForEnterpriseRequest $request): GroupsResource
    {
        return $this->sendGroupsRequest($request);
    }

    /**
     * @param GenericRequest|GetGroupRequest $getGroupRequest
     * @return Group
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getGroup(GenericRequest|GetGroupRequest $getGroupRequest): Group
    {
        return $this->sendGroupRequest($getGroupRequest);
    }

    /**
     * @param GenericRequest|CreateGroupRequest $request
     * @return Group
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createGroup(GenericRequest|CreateGroupRequest $request): Group
    {
        return $this->sendGroupRequest($request);
    }


    /**
     * @param UpdateGroupRequest $request
     * @return Group
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateGroup(GenericRequest|UpdateGroupRequest $request): Group
    {
        return $this->sendGroupRequest($request);
    }

    /**
     * @param GenericRequest|RemoveGroupRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeGroup(GenericRequest|RemoveGroupRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param GenericRequest|ListGroupCollaborationsRequest $request
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listGroupCollaborations(GenericRequest|ListGroupCollaborationsRequest $request): CollaborationsResource
    {
        return $this->sendCollaborationsRequest($request);
    }

    /**
     * @param GenericRequest|ListMembersOfGroupRequest $request
     * @return GroupMembershipsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listMembersOfGroup(GenericRequest|ListMembersOfGroupRequest $request): GroupMembershipsResource
    {
        return $this->sendGroupMembershipsRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return Group
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendGroupRequest(BaseRequest $request): Group
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new Group($response);
    }

    /**
     * @param BaseRequest $request
     * @return GroupsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendGroupsRequest(BaseRequest $request): GroupsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new GroupsResource($response);
    }

}