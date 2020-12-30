<?php

namespace Mitquinn\BoxApiSdk\Tests\Initialization;

use Mitquinn\BoxApiSdk\AuthorizationConfigurations\ServerAuthorization;

use PHPUnit\Framework\TestCase;

/**
 * Class ServerAuthorizationTest
 * @package Mitquinn\BoxApiSdk\Tests\Initialization
 */
class ServerAuthorizationTest extends TestCase
{
    protected ServerAuthorization $serverAuthorization;

    protected function setUp(): void
    {
        $this->initializeServerAuthorization();
    }

    public function testBoxConfiguration()
    {
        $serverAuthorization = $this->getServerAuthorization();
        static::assertEquals('clientId', $serverAuthorization->getClientId());
        static::assertEquals('clientSecret', $serverAuthorization->getClientSecret());
        static::assertEquals('publicKeyId', $serverAuthorization->getPublicKeyId());
        static::assertEquals('privateKey', $serverAuthorization->getPrivateKey());
        static::assertEquals('passphrase', $serverAuthorization->getPassphrase());
        static::assertEquals(12345, $serverAuthorization->getEnterpriseId());
    }

    public function initializeServerAuthorization()
    {
        $serverAuthorization = new ServerAuthorization(
            clientId: 'clientId',
            clientSecret: 'clientSecret',
            publicKeyId: 'publicKeyId',
            privateKey: 'privateKey',
            passphrase: 'passphrase',
            enterpriseID: 12345,
            authorizationUrl: "https://api.box.com/oauth2/token"
        );
        $this->setServerAuthorization($serverAuthorization);
    }


    /*** Getters and Setters ***/

    /**
     * @return ServerAuthorization
     */
    public function getServerAuthorization(): ServerAuthorization
    {
        return $this->serverAuthorization;
    }

    /**
     * @param ServerAuthorization $serverAuthorization
     * @return ServerAuthorizationTest
     */
    public function setServerAuthorization(ServerAuthorization $serverAuthorization): ServerAuthorizationTest
    {
        $this->serverAuthorization = $serverAuthorization;
        return $this;
    }

}
