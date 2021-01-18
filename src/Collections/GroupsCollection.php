<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\CreateGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\GetGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\RemoveGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\UpdateGroupRequest;
use Mitquinn\BoxApiSdk\Resources\GroupResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GroupsCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class GroupsCollection extends BaseCollection
{

    public function listGroupsForEnterprise()
    {

    }

    /**
     * @param int $id
     * @param array $query
     * @param GetGroupRequest|null $getGroupRequest
     * @return GroupResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getGroup(int $id, array $query = [], GetGroupRequest $getGroupRequest = null): GroupResource
    {
        if (is_null($getGroupRequest)) {
            $getGroupRequest = new GetGroupRequest(id: $id, query: $query);
        }

        return $this->sendGroupRequest($getGroupRequest);
    }

    /**
     * @param array $body
     * @param array $query
     * @param CreateGroupRequest|null $createGroupRequest
     * @return GroupResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createGroup(array $body, array $query = [], CreateGroupRequest $createGroupRequest = null): GroupResource
    {
        if (is_null($createGroupRequest)) {
            $createGroupRequest = new CreateGroupRequest(body: $body, query: $query);
        }

        return $this->sendGroupRequest($createGroupRequest);
    }


    /**
     * @param int $id
     * @param array $query
     * @param array $body
     * @param UpdateGroupRequest|null $updateGroupRequest
     * @return GroupResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateGroup(int $id, array $query = [], array $body = [], UpdateGroupRequest $updateGroupRequest = null): GroupResource
    {
        if (is_null($updateGroupRequest)) {
            $updateGroupRequest = new UpdateGroupRequest(id: $id, query: $query, body: $body);
        }

        return $this->sendGroupRequest($updateGroupRequest);
    }

    /**
     * @param int $id
     * @param RemoveGroupRequest|null $removeGroupRequest
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeGroup(int $id, RemoveGroupRequest $removeGroupRequest = null): NoContentResource
    {
        if (is_null($removeGroupRequest)) {
            $removeGroupRequest = new RemoveGroupRequest(id: $id);
        }

        return $this->sendNoContentRequest($removeGroupRequest);
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

    protected function sendGroupsRequest()
    {

    }

}