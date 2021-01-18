<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Mitquinn\BoxApiSdk\Resources\GroupResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Tests\Api\BaseTest;

/**
 * Class GroupsCollectionTest
 * @package Mitquinn\BoxApiSdk\Tests\Api\Collections
 */
class GroupsCollectionTest extends BaseTest
{


    public function createGroup(): GroupResource
    {
        $body = [
            'name' => $this->faker->name
        ];

        $groupResource = $this->getBoxService()->groups()->createGroup(body: $body);
        static::assertInstanceOf(GroupResource::class, $groupResource);
        return $groupResource;
    }


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


}