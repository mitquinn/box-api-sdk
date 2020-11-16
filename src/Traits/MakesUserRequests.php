<?php


namespace Mitquinn\BoxApiSdk\Traits;


use Mitquinn\BoxApiSdk\Requests\User\GetUserRequest;
use Mitquinn\BoxApiSdk\Resources\UserResource;

trait MakesUserRequests
{
    public function listEnterpriseUsers(): array
    {

    }

    public function getCurrentUser(): UserResource
    {

    }

    public function getUser(int $userId, array $query = [], GetUserRequest $getUserRequest = null): UserResource
    {
        /** @var \Psr\Http\Client\ClientInterface $client */
        $client = $this->getClient();
        $userRequest = new GetUserRequest($userId, $query);
        $response = $client->sendRequest($userRequest->generateRequestInterface());

        $user = new UserResource();
        return $user;

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

}