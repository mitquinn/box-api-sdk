<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Resources\GroupMembershipResource;
use Mitquinn\BoxApiSdk\Tests\Api\BaseTest;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GroupMembershipsCollection
 * @package Mitquinn\BoxApiSdk\Tests\Api\Collections
 */
class GroupMembershipsCollectionTest extends BaseTest
{


    /**
     * @return GroupMembershipResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function createGroupMembership(): GroupMembershipResource
    {
        $groupResource = $this->createGroup();
        $userResource = $this->getBoxService()->users()->getCurrentUser();
        $body = [
            'group' => [
                'id' => $groupResource->getId()
            ],
            'user' => [
                'id' => $userResource->getId()
            ]
        ];

        $groupMembershipResource = $this->getBoxService()->groupMemberships()->addUserToGroup($body);
        static::assertInstanceOf(GroupMembershipResource::class, $groupMembershipResource);
        return $groupMembershipResource;
    }

    public function testGetGroupMembership()
    {
        $groupMembershipResourceCreated = $this->createGroupMembership();
        $groupMembershipResource = $this->getBoxService()->groupMemberships()->getGroupMembership($groupMembershipResourceCreated->getId());
        static::assertInstanceOf(GroupMembershipResource::class, $groupMembershipResource);
        $this->getBoxService()->groups()->removeGroup($groupMembershipResource->getGroup()->getId());
    }


    public function testAddUserToGroup()
    {
        $groupResource = $this->createGroup();
        $userResource = $this->getBoxService()->users()->getCurrentUser();
        $body = [
            'group' => [
                'id' => $groupResource->getId()
            ],
            'user' => [
                'id' => $userResource->getId()
            ]
        ];

        $groupMembershipResource = $this->getBoxService()->groupMemberships()->addUserToGroup($body);
        static::assertInstanceOf(GroupMembershipResource::class, $groupMembershipResource);
        $this->getBoxService()->groups()->removeGroup($groupMembershipResource->getGroup()->getId());
    }

}