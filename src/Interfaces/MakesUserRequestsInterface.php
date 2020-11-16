<?php


namespace Mitquinn\BoxApiSdk\Interfaces;


use Mitquinn\BoxApiSdk\Resources\UserResource;

interface MakesUserRequestsInterface
{
    public function listEnterpriseUsers(): array;

    public function getCurrentUser(): UserResource;

    public function getUser(int $userId): UserResource;

    public function createUser(): UserResource;

    public function updateUser(): UserResource;

    public function deleteUser(): UserResource;

}