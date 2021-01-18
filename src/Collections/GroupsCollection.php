<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\CreateGroupRequest;
use Mitquinn\BoxApiSdk\Resources\GroupResource;
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

    public function getGroup()
    {

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


    public function updateGroup()
    {

    }

    public function removeGroup()
    {

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