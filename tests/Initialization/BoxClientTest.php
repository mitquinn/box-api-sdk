<?php

namespace Mitquinn\BoxApiSdk\Tests\Initialization;


use Mitquinn\BoxApiSdk\BoxClient;
use Mitquinn\BoxApiSdk\BoxConfiguration;
use PHPUnit\Framework\TestCase;

class BoxClientTest extends TestCase
{

    public function testInitialization()
    {
        $boxConfiguration = new BoxConfiguration(
            'clientId',
            'clientSecret',
            'publicKeyId',
            'privateKey',
            'passphrase',
            12345
        );
        $boxClient = new BoxClient($boxConfiguration);

        static::assertInstanceOf(BoxClient::class, $boxClient);
    }

}
