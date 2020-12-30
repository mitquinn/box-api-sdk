<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\User\GetCurrentUserRequest;
use Mitquinn\BoxApiSdk\Requests\User\GetUserRequest;
use Mitquinn\BoxApiSdk\Requests\User\ListEnterpriseUsersRequest;
use Mitquinn\BoxApiSdk\Resources\UserResource;
use Mitquinn\BoxApiSdk\Resources\UsersResource;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class UserCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class UserCollection extends BaseCollection
{

    public function listEnterpriseUsers(array $query = [], ListEnterpriseUsersRequest $listEnterpriseUsersRequest = null): UsersResource
    {
        if (is_null($listEnterpriseUsersRequest)) {
            $listEnterpriseUsersRequest = new ListEnterpriseUsersRequest(query: $query);
        }

        return $this->sendUsersRequest($listEnterpriseUsersRequest);

    }

    /**
     * @param array $query
     * @param GetCurrentUserRequest|null $getCurrentUserRequest
     * @return UserResource
     * @throws BoxAuthorizationException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws BoxBadRequestException
     */
    public function getCurrentUser(array $query = [], GetCurrentUserRequest $getCurrentUserRequest = null): UserResource
    {
        if (is_null($getCurrentUserRequest)) {
            $getCurrentUserRequest = new GetCurrentUserRequest(query: $query);
        }

        return $this->sendUserRequest($getCurrentUserRequest);
    }

    /**
     * @param int $id
     * @param array $query
     * @param GetUserRequest|null $getUserRequest
     * @return UserResource
     * @throws BoxAuthorizationException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getUser(int $id, array $query = [], GetUserRequest $getUserRequest = null): UserResource
    {
        if (is_null($getUserRequest)) {
            $getUserRequest = new GetUserRequest(id: $id, query: $query);
        }

        return $this->sendUserRequest($getUserRequest);

    }

    public function createUser(): UserResource
    {

    }

    public function updateUser(): UserResource
    {

    }

    public function deleteUser(): UserResource
    {

    }


    /**
     * @param BaseRequest $request
     * @return UserResource
     * @throws BoxAuthorizationException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendUserRequest(BaseRequest $request): UserResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new UserResource($response);
    }

    protected function sendUsersRequest(BaseRequest $request): UsersResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new UsersResource($response);
    }

}