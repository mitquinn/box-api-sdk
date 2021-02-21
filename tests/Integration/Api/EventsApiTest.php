<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Requests\Events\ListUserAndEnterpriseEventsRequest;
use Mitquinn\BoxApiSdk\Resources\Events;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class EventsApiTest
 * @package Mitquinn\BoxApiSdk\Tests\Integration\Api
 */
class EventsApiTest extends BaseTest
{

    public function testListUserAndEnterpriseEvents()
    {
        $request = new ListUserAndEnterpriseEventsRequest();
        $eventsResource = $this->getBoxService()->events()->listUserAndEnterpriseEvents($request);
        static::assertInstanceOf(Events::class, $eventsResource);
    }


}