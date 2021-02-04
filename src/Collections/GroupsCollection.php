<?php

namespace Mitquinn\BoxApiSdk\Collections;

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
use Mitquinn\BoxApiSdk\Resources\GroupResource;
use Mitquinn\BoxApiSdk\Resources\GroupsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GroupsCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class GroupsCollection extends BaseCollection
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
     * @return GroupResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getGroup(GenericRequest|GetGroupRequest $getGroupRequest): GroupResource
    {
        return $this->sendGroupRequest($getGroupRequest);
    }

    /**
     * @param GenericRequest|CreateGroupRequest $request
     * @return GroupResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createGroup(GenericRequest|CreateGroupRequest $request): GroupResource
    {
        return $this->sendGroupRequest($request);
    }


    /**
     * @param UpdateGroupRequest $request
     * @return GroupResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateGroup(GenericRequest|UpdateGroupRequest $request): GroupResource
    {
        return $this->sendGroupRequest($request);
    }

    /**
     * @param GenericRequest|RemoveGroupRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeGroup(GenericRequest|RemoveGroupRequest $request): NoContentResource
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
     * @return GroupResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendGroupRequest(BaseRequest $request): GroupResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new GroupResource($response);
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