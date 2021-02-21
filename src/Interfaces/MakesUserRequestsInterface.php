<?php


namespace Mitquinn\BoxApiSdk\Interfaces;


use Mitquinn\BoxApiSdk\Resources\User;

interface MakesUserRequestsInterface
{
    public function listEnterpriseUsers(): array;

    public function getCurrentUser(): User;

    public function getUser(int $userId): User;

    public function createUser(): User;

    public function updateUser(): User;

    public function deleteUser(): User;

}