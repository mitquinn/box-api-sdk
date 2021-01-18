<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Collections;

use Mitquinn\BoxApiSdk\Resources\GroupResource;
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
    }



}