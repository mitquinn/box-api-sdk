<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Requests\Collections\ListAllCollectionsRequest;
use Mitquinn\BoxApiSdk\Requests\Collections\ListCollectionItemsRequest;
use Mitquinn\BoxApiSdk\Resources\CollectionsResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class CollectionsApiTest
 * @package Mitquinn\BoxApiSdk\Tests\Integration\Api
 */
class CollectionsApiTest extends BaseTest
{

    public function testListAllCollections()
    {
        $request = new ListAllCollectionsRequest();
        $collectionsResource = $this->getBoxService()->collections()->listAllCollections($request);
        static::assertInstanceOf(CollectionsResource::class, $collectionsResource);
    }

    public function testListCollectionItems()
    {
        $request = new ListAllCollectionsRequest();
        $collectionsResource = $this->getBoxService()->collections()->listAllCollections($request);
        $entries = $collectionsResource->getEntries();
        $collectionResource = $entries[0];


        $itemsRequest = new ListCollectionItemsRequest($collectionResource->getId());
        $itemsResource = $this->getBoxService()->collections()->listCollectionItems($itemsRequest);
        static::assertInstanceOf(ItemsResource::class, $itemsResource);

    }

}