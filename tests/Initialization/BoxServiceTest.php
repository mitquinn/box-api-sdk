<?php

namespace Mitquinn\BoxApiSdk\Tests\Initialization;

use GuzzleHttp\Client;
use Mitquinn\BoxApiSdk\AuthorizationConfigurations\ServerAuthorization;
use Mitquinn\BoxApiSdk\BoxService;
use PHPUnit\Framework\TestCase;

/**
 * Class BoxClientTest
 * @package Mitquinn\BoxApiSdk\Tests\Initialization
 */
class BoxServiceTest extends TestCase
{
    /**
     * TestInitialization
     */
    public function testInitialization()
    {
        $serverAuthorization = new ServerAuthorization(
            clientId: 'clientId',
            clientSecret: 'clientSecret',
            publicKeyId: 'publicKeyId',
            privateKey: 'privateKey',
            passphrase: 'passphrase',
            enterpriseID: 12345,
            authorizationUrl: 'https://api.box.com/oauth2/token'
        );

        //Todo: Add a mock handler here?
        $client = new Client();

        $boxClient = new BoxService(
            authorizationConfiguration: $serverAuthorization,
            client: $client
        );

        static::assertInstanceOf(BoxService::class, $boxClient);
    }

}
