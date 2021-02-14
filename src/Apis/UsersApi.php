<?php

namespace Mitquinn\BoxApiSdk\Apis;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\EmailAliases\CreateEmailAliasRequest;
use Mitquinn\BoxApiSdk\Requests\EmailAliases\ListUsersEmailAliasesRequest;
use Mitquinn\BoxApiSdk\Requests\EmailAliases\RemoveEmailAliasRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Requests\Users\GetCurrentUserRequest;
use Mitquinn\BoxApiSdk\Requests\Users\GetUserRequest;
use Mitquinn\BoxApiSdk\Requests\Users\ListEnterpriseUsersRequest;
use Mitquinn\BoxApiSdk\Requests\Users\ListUsersGroupsRequest;
use Mitquinn\BoxApiSdk\Requests\Users\UpdateUserRequest;
use Mitquinn\BoxApiSdk\Resources\EmailAliasesResource;
use Mitquinn\BoxApiSdk\Resources\EmailAliasResource;
use Mitquinn\BoxApiSdk\Resources\GroupMembershipsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Resources\UserResource;
use Mitquinn\BoxApiSdk\Resources\UsersResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class UserCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class UsersApi extends BaseApi
{

    /**
     * @param GenericRequest|ListEnterpriseUsersRequest $request
     * @return UsersResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listEnterpriseUsers(GenericRequest|ListEnterpriseUsersRequest $request): UsersResource
    {
        return $this->sendUsersRequest($request);
    }

    /**
     * @param GenericRequest|GetCurrentUserRequest $request
     * @return UserResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getCurrentUser(GenericRequest|GetCurrentUserRequest $request): UserResource
    {
        return $this->sendUserRequest($request);
    }

    /**
     * @param GenericRequest|GetUserRequest $request
     * @return UserResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getUser(GenericRequest|GetUserRequest $request): UserResource
    {
        return $this->sendUserRequest($request);
    }

    /**
     * Todo: I will need a box enterprise account to set this up.
     * @return UserResource
     */
    public function createUser(): UserResource
    {

    }

    /**
     * @param GenericRequest|UpdateUserRequest $request
     * @return UserResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateUser(GenericRequest|UpdateUserRequest $request): UserResource
    {
        return $this->sendUserRequest($request);
    }

    /**
     * Todo: I will need a box enterprise account to set this up.
     * @return UserResource
     */
    public function deleteUser(): UserResource
    {

    }

    /**
     * @param GenericRequest|ListUsersGroupsRequest $request
     * @return GroupMembershipsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listUsersGroups(GenericRequest|ListUsersGroupsRequest $request): GroupMembershipsResource
    {
        return $this->sendGroupMembershipsRequest($request);
    }

    /**
     * @param GenericRequest|ListUsersEmailAliasesRequest $request
     * @return EmailAliasesResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listUsersEmailAliases(GenericRequest|ListUsersEmailAliasesRequest $request): EmailAliasesResource
    {
        return $this->sendEmailAliasesRequest($request);
    }

    /**
     * @param GenericRequest|CreateEmailAliasRequest $request
     * @return EmailAliasResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createEmailAlias(GenericRequest|CreateEmailAliasRequest $request): EmailAliasResource
    {
        return $this->sendEmailAliasRequest($request);
    }

    /**
     * @param GenericRequest|RemoveEmailAliasRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeEmailAlias(GenericRequest|RemoveEmailAliasRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return EmailAliasResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendEmailAliasRequest(BaseRequest $request): EmailAliasResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new EmailAliasResource($response);
    }

    /**
     * @param BaseRequest $request
     * @return EmailAliasesResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendEmailAliasesRequest(BaseRequest $request): EmailAliasesResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new EmailAliasesResource($response);
    }

    /**
     * @param BaseRequest $request
     * @return UserResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
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

    /**
     * @param BaseRequest $request
     * @return UsersResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendUsersRequest(BaseRequest $request): UsersResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new UsersResource($response);
    }

}