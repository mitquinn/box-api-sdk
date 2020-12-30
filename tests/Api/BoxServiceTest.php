<?php

namespace Mitquinn\BoxApiSdk\Tests\Api;

/**
 * Class BoxClientTest
 * @package Mitquinn\BoxApiSdk\Tests\Api
 */
class BoxServiceTest extends BaseTest
{

    /**
     * Test Access Token Availability
     */
    public function testAccessTokenAvailability()
    {
        $accessToken = $this->getBoxService()->getAccessToken();
        static::assertIsString($accessToken);
    }

}