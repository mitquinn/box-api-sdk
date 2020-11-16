<?php


use Mitquinn\BoxApiSdk\BoxConfiguration;
use PHPUnit\Framework\TestCase;

class BoxConfigurationTest extends TestCase
{
    protected BoxConfiguration $boxConfiguration;

    protected function setUp(): void
    {
        $this->initializeBoxConfiguration();
    }

    public function testBoxConfiguration()
    {
        $boxConfiguration = $this->getBoxConfiguration();
        static::assertEquals('clientId', $boxConfiguration->getClientId());
        static::assertEquals('clientSecret', $boxConfiguration->getClientSecret());
        static::assertEquals('publicKeyId', $boxConfiguration->getPublicKeyId());
        static::assertEquals('privateKey', $boxConfiguration->getPrivateKey());
        static::assertEquals('passphrase', $boxConfiguration->getPassphrase());
        static::assertEquals(12345, $boxConfiguration->getEnterpriseId());
    }

    public function initializeBoxConfiguration()
    {
        $boxConfiguration = new BoxConfiguration(
            'clientId',
            'clientSecret',
            'publicKeyId',
            'privateKey',
            'passphrase',
            12345
        );
        $this->setBoxConfiguration($boxConfiguration);
    }


    /*** Getters and Setters ***/

    /**
     * @return BoxConfiguration
     */
    public function getBoxConfiguration(): BoxConfiguration
    {
        return $this->boxConfiguration;
    }

    /**
     * @param BoxConfiguration $boxConfiguration
     * @return BoxConfigurationTest
     */
    public function setBoxConfiguration(BoxConfiguration $boxConfiguration): BoxConfigurationTest
    {
        $this->boxConfiguration = $boxConfiguration;
        return $this;
    }

}
