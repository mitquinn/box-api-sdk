<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Mitquinn\BoxApiSdk\Requests\Groups\CreateGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\GetGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\ListGroupCollaborationsRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\ListGroupsForEnterpriseRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\ListMembersOfGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\RemoveGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\UpdateGroupRequest;
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

        $request = new CreateGroupRequest(body: $body);
        $groupResource = $this->getBoxService()->groups()->createGroup($request);
        static::assertInstanceOf(GroupResource::class, $groupResource);
        $this->removeGroup($groupResource->getId());
    }

    public function testRemoveGroup()
    {
        $groupResource = $this->createGroup();
        $request = new RemoveGroupRequest($groupResource->getId());
        $noContentResource = $this->getBoxService()->groups()->removeGroup($request);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }

    public function testGetGroup()
    {
        $groupResource = $this->createGroup();
        $request = new GetGroupRequest($groupResource->getId());
        $getGroupRequestResource = $this->getBoxService()->groups()->getGroup($request);
        static::assertInstanceOf(GroupResource::class, $getGroupRequestResource);
        $this->removeGroup($groupResource->getId());
    }


    public function testUpdateGroup()
    {
        $groupResource = $this->createGroup();
        $name = $groupResource->getName().' Updated';
        $updateBody = [
            'name' => $name
        ];

        $updateRequest = new UpdateGroupRequest(id: $groupResource->getId(), body:$updateBody);
        $updateGroupResource = $this->getBoxService()->groups()->updateGroup($updateRequest);
        static::assertInstanceOf(GroupResource::class, $updateGroupResource);
        static::assertEquals($name, $updateGroupResource->getName() );
        $this->removeGroup($groupResource->getId());
    }

    public function testListGroupsForEnterprise()
    {
        $request = new ListGroupsForEnterpriseRequest();
        $groupsResource = $this->getBoxService()->groups()->listGroupsForEnterprise($request);
        static::assertInstanceOf(GroupsResource::class, $groupsResource);
    }


    public function testListGroupCollaborations()
    {
        $groupResource = $this->createGroup();
        $request = new ListGroupCollaborationsRequest($groupResource->getId());
        $collaborationsResource = $this->getBoxService()->groups()->listGroupCollaborations($request);
        static::assertInstanceOf(CollaborationsResource::class, $collaborationsResource);
        $this->removeGroup($groupResource->getId());
    }

    public function testListMembersOfGroup()
    {
        $groupResource = $this->createGroup();
        $request = new ListMembersOfGroupRequest($groupResource->getId());
        $groupMembershipsResource = $this->getBoxService()->groups()->listMembersOfGroup($request);
        static::assertInstanceOf(GroupMembershipsResource::class, $groupMembershipsResource);
        $this->removeGroup($groupResource->getId());
    }

    protected function removeGroup(int $id)
    {
        //Clean Up
        $deleteRequest = new RemoveGroupRequest($id);
        $noContentResource = $this->getBoxService()->groups()->removeGroup($deleteRequest);
        static::assertInstanceOf(NoContentResource::class, $noContentResource);
    }

}