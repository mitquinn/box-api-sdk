<?php

namespace Mitquinn\BoxApiSdk\Api;

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
use Mitquinn\BoxApiSdk\Resources\EmailAlias;
use Mitquinn\BoxApiSdk\Resources\GroupMembershipsResource;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Resources\User;
use Mitquinn\BoxApiSdk\Resources\UsersResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class UserCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class Users extends Api
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
     * @return User
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getCurrentUser(GenericRequest|GetCurrentUserRequest $request): User
    {
        return $this->sendUserRequest($request);
    }

    /**
     * @param GenericRequest|GetUserRequest $request
     * @return User
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getUser(GenericRequest|GetUserRequest $request): User
    {
        return $this->sendUserRequest($request);
    }

    /**
     * Todo: I will need a box enterprise account to set this up.
     * @return User
     */
    public function createUser(): User
    {

    }

    /**
     * @param GenericRequest|UpdateUserRequest $request
     * @return User
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateUser(GenericRequest|UpdateUserRequest $request): User
    {
        return $this->sendUserRequest($request);
    }

    /**
     * Todo: I will need a box enterprise account to set this up.
     * @return User
     */
    public function deleteUser(): User
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
     * @return EmailAlias
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createEmailAlias(GenericRequest|CreateEmailAliasRequest $request): EmailAlias
    {
        return $this->sendEmailAliasRequest($request);
    }

    /**
     * @param GenericRequest|RemoveEmailAliasRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeEmailAlias(GenericRequest|RemoveEmailAliasRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return EmailAlias
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendEmailAliasRequest(BaseRequest $request): EmailAlias
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new EmailAlias($response);
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
     * @return User
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendUserRequest(BaseRequest $request): User
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new User($response);
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