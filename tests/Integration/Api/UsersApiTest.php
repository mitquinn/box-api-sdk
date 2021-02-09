<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Requests\Users\GetCurrentUserRequest;
use Mitquinn\BoxApiSdk\Requests\Users\GetUserRequest;
use Mitquinn\BoxApiSdk\Requests\Users\ListEnterpriseUsersRequest;
use Mitquinn\BoxApiSdk\Requests\Users\ListUsersGroupsRequest;
use Mitquinn\BoxApiSdk\Requests\Users\UpdateUserRequest;
use Mitquinn\BoxApiSdk\Resources\GroupMembershipsResource;
use Mitquinn\BoxApiSdk\Resources\UserResource;
use Mitquinn\BoxApiSdk\Resources\UsersResource;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;


/**
 * Class BoxApiSdkUserTest
 * @package Mitquinn\BoxApiSdk\Tests\Api\User
 */
class UsersApiTest extends BaseTest
{

    public function testGetCurrentUser()
    {
        $request = new GetCurrentUserRequest();
        $userResource = $this->getBoxService()->users()->getCurrentUser($request);
        static::assertInstanceOf(UserResource::class, $userResource);
    }

    public function testGetCurrentUserWithFullFields()
    {
        $request = new GetCurrentUserRequest(['fields' => 'id,type,address,avatar_url,can_see_managed_users,created_at,enterprise,external_app_user_id,hostname,is_exempt_from_device_limits,is_exempt_from_login_verification,is_external_collab_restricted,is_platform_access_only,is_sync_enabled,job_title,language,login,max_upload_size,modified_at,my_tags,name,notification_email,phone,role,space_amount,space_used,status,timezone,tracking_codes']);
        $userResource = $this->getBoxService()->users()->getCurrentUser($request);
        static::assertInstanceOf(UserResource::class, $userResource);
        static::assertIsInt($userResource->getId());
        static::assertIsString($userResource->getType());
        static::assertIsString($userResource->getAddress());
        static::assertIsString($userResource->getAvatarUrl());
        static::assertIsBool($userResource->isCanSeeManagedUsers());
        static::assertIsString($userResource->getCreatedAt());
        static::assertIsArray($userResource->getEnterprise());
        static::assertArrayHasKey('id', $userResource->getEnterprise());
        static::assertArrayHasKey('type', $userResource->getEnterprise());
        static::assertArrayHasKey('name', $userResource->getEnterprise());
        static::assertNull($userResource->getExternalAppUserId());
        static::assertIsString($userResource->getHostname());
        static::assertIsBool($userResource->isIsExemptFromDeviceLimits());
        static::assertIsBool($userResource->isIsExemptFromLoginVerification());
        static::assertIsBool($userResource->isIsExternalCollabRestricted());
        static::assertIsBool($userResource->isIsPlatformAccessOnly());
        static::assertIsBool($userResource->isIsSyncEnabled());
        static::assertIsString($userResource->getJobTitle());
        static::assertIsString($userResource->getLanguage());
        static::assertIsString($userResource->getLogin());
        static::assertIsInt($userResource->getMaxUploadSize());
        static::assertIsString($userResource->getModifiedAt());
        static::assertIsArray($userResource->getMyTags());
        static::assertIsString($userResource->getName());
        static::assertIsArray($userResource->getNotificationEmail());
        static::assertIsString($userResource->getPhone());
        static::assertIsString($userResource->getRole());
        static::assertIsInt($userResource->getSpaceAmount());
        static::assertIsInt($userResource->getSpaceUsed());
        static::assertIsString($userResource->getStatus());
        static::assertIsString($userResource->getTimezone());
        static::assertIsArray($userResource->getTrackingCodes());
    }

    public function testListEnterpriseUsers()
    {
        $request = new ListEnterpriseUsersRequest();
        $usersResource = $this->getBoxService()->users()->listEnterpriseUsers($request);
        static::assertInstanceOf(UsersResource::class, $usersResource);
    }


    /**
     * Todo: Need to extra the user id to an env variable.
     * @throws \Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException
     * @throws \Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException
     * @throws \Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException
     * @throws \Psr\Http\Client\ClientExceptionInterface
     */
    public function testGetUser()
    {
        $request = new GetUserRequest(13372896237);
        $userResource = $this->getBoxService()->users()->getUser($request);
        static::assertInstanceOf(UserResource::class, $userResource);
    }

    public function testUpdateUser()
    {
        $request = new UpdateUserRequest(id: 13372896237, body: ['address' => '123 Fake Street']);
        $userResource = $this->getBoxService()->users()->updateUser($request);
        static::assertInstanceOf($userResource::class, $userResource);
    }

    public function testListUsersGroups()
    {
        $currentUserRequest = new GetCurrentUserRequest();
        $userResource = $this->getBoxService()->users()->getCurrentUser($currentUserRequest);

        $request = new ListUsersGroupsRequest($userResource->getId());
        $groupMembershipsResource = $this->getBoxService()->users()->listUsersGroups($request);
        static::assertInstanceOf(GroupMembershipsResource::class, $groupMembershipsResource);
    }


}