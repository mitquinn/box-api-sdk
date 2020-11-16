<?php

namespace Mitquinn\BoxApiSdk\Tests\Api;

use Mitquinn\BoxApiSdk\BoxClient;
use Mitquinn\BoxApiSdk\BoxConfiguration;
use Mitquinn\BoxApiSdk\Interfaces\BoxConfigurationInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;

/**
 * Class BoxApiSdkBaseTest
 * @package Mitquinn\BoxApiSdk\Tests\Api
 */
abstract class BoxApiSdkBaseTest extends TestCase
{
    protected BoxConfigurationInterface $boxConfiguration;

    protected BoxClient $boxClient;


    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $dotenv = new Dotenv();
        //TODO: This is silly. There must be a way to define this in phpunit.xml
        $dotenv->load(__DIR__.'/../../.env.dev');

        $clientId = $_ENV['BoxClientId'];
        $clientSecret = $_ENV['BoxClientSecret'];
        $publicKeyId = $_ENV['BoxPublicKeyId'];
        $privateKey = $_ENV['BoxPrivateKey'];
        $passphrase = $_ENV['BoxPassphrase'];
        $enterpriseId = $_ENV['BoxEnterpriseId'];

        $boxConfiguration = new BoxConfiguration(
            $clientId,
            $clientSecret,
            $publicKeyId,
            $privateKey,
            $passphrase,
            $enterpriseId
        );

        $this->setBoxConfiguration($boxConfiguration);
        $this->setBoxClient(new BoxClient($boxConfiguration));
    }

    /**
     * @return BoxConfigurationInterface
     */
    public function getBoxConfiguration(): BoxConfigurationInterface
    {
        return $this->boxConfiguration;
    }

    /**
     * @param BoxConfigurationInterface $boxConfiguration
     * @return BoxApiSdkBaseTest
     */
    public function setBoxConfiguration(BoxConfigurationInterface $boxConfiguration): BoxApiSdkBaseTest
    {
        $this->boxConfiguration = $boxConfiguration;
        return $this;
    }

    /**
     * @return BoxClient
     */
    public function getBoxClient(): BoxClient
    {
        return $this->boxClient;
    }

    /**
     * @param BoxClient $boxClient
     * @return BoxApiSdkBaseTest
     */
    public function setBoxClient(BoxClient $boxClient): BoxApiSdkBaseTest
    {
        $this->boxClient = $boxClient;
        return $this;
    }

}
