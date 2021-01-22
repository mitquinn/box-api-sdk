<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\GroupMembershipsResource;
use Mitquinn\BoxApiSdk\Resources\GroupResource;
use Mitquinn\BoxApiSdk\Resources\GroupsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Tests\Api\BaseTest;

/**
 * Class GroupsCollectionTest
 * @package Mitquinn\BoxApiSdk\Tests\Api\Collections
 */
class GroupsCollectionTest extends BaseTest
{

    public function testCreateGroup()
    {
        $body = [
            'name' => $this->faker->name
        ];

        $groupResource = $this->getBoxService()->groups()->createGroup(body: $body);
        static::assertInstanceOf(GroupResource::class, $groupResource);
        $this->getBoxService()->groups()->removeGroup($groupResource->getId());
    }

    public function testRemoveGroup()
    {
        $groupResource = $this->createGroup();
        $noContentResource = $this->getBoxService()->groups()->removeGroup($groupResource->getId());
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }

    public function testGetGroup()
    {
        $groupResource = $this->createGroup();
        $getGroupRequestResource = $this->getBoxService()->groups()->getGroup($groupResource->getId());
        static::assertInstanceOf(GroupResource::class, $getGroupRequestResource);
        $this->getBoxService()->groups()->removeGroup($groupResource->getId());
    }


    public function testUpdateGroup()
    {
        $groupResource = $this->createGroup();
        $name = $groupResource->getName().' Updated';
        $updateBody = [
            'name' => $name
        ];

        $updateGroupResource = $this->getBoxService()->groups()->updateGroup(id: $groupResource->getId(), body:$updateBody);
        static::assertInstanceOf(GroupResource::class, $updateGroupResource);
        static::assertEquals($name, $updateGroupResource->getName() );
        $this->getBoxService()->groups()->removeGroup($groupResource->getId());
    }

    public function testListGroupsForEnterprise()
    {
        $groupsResource = $this->getBoxService()->groups()->listGroupsForEnterprise();
        static::assertInstanceOf(GroupsResource::class, $groupsResource);
    }


    public function testListGroupCollaborations()
    {
        $groupResource = $this->createGroup();
        $collaborationsResource = $this->getBoxService()->groups()->listGroupCollaborations($groupResource->getId());
        static::assertInstanceOf(CollaborationsResource::class, $collaborationsResource);
        $this->getBoxService()->groups()->removeGroup($groupResource->getId());
    }

    public function testListMembersOfGroup()
    {
        $groupResource = $this->createGroup();
        $groupMembershipsResource = $this->getBoxService()->groups()->listMembersOfGroup($groupResource->getId());
        static::assertInstanceOf(GroupMembershipsResource::class, $groupMembershipsResource);
        $this->getBoxService()->groups()->removeGroup($groupResource->getId());
    }



}