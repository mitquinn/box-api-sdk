<?php

namespace Mitquinn\BoxApiSdk\Tests\Api;

use Mitquinn\BoxApiSdk\AuthorizationConfigurations\ServerAuthorization;
use Mitquinn\BoxApiSdk\BoxService;
use Mitquinn\BoxApiSdk\Interfaces\AuthorizationInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Dotenv\Dotenv;
use function Couchbase\defaultDecoder;

/**
 * Class BoxApiSdkBaseTest
 * @package Mitquinn\BoxApiSdk\Tests\Api
 */
abstract class BaseTest extends TestCase
{

    /** @var AuthorizationInterface $authorizationConfiguration */
    protected AuthorizationInterface $authorizationConfiguration;

    /** @var BoxService $boxService */
    protected BoxService $boxService;

    /**
     * BoxApiSdkBaseTest constructor.
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $dotenv = new Dotenv();
        //TODO: This is silly. There must be a way to define this in phpunit.xml
        $dotenv->load(__DIR__ . '/../../.env.dev');

        $clientId = $_ENV['BoxClientId'];
        $clientSecret = $_ENV['BoxClientSecret'];
        $publicKeyId = $_ENV['BoxPublicKeyId'];
        $privateKey = $_ENV['BoxPrivateKey'];
        $passphrase = $_ENV['BoxPassphrase'];
        $enterpriseId = $_ENV['BoxEnterpriseId'];



        $serverAuthorization = new ServerAuthorization(
            clientId: $clientId,
            clientSecret: $clientSecret,
            publicKeyId: $publicKeyId,
            privateKey: $privateKey,
            passphrase: $passphrase,
            enterpriseID: $enterpriseId
        );

        $this->setAuthorizationConfiguration($serverAuthorization);
        $this->setBoxService(new BoxService($serverAuthorization));
    }

    /**
     * @return AuthorizationInterface
     */
    public function getAuthorizationConfiguration(): AuthorizationInterface
    {
        return $this->authorizationConfiguration;
    }

    /**
     * @param AuthorizationInterface $authorizationConfiguration
     * @return BaseTest
     */
    public function setAuthorizationConfiguration(AuthorizationInterface $authorizationConfiguration): BaseTest
    {
        $this->authorizationConfiguration = $authorizationConfiguration;
        return $this;
    }

    /**
     * @return BoxService
     */
    public function getBoxService(): BoxService
    {
        return $this->boxService;
    }

    /**
     * @param BoxService $boxService
     * @return BaseTest
     */
    public function setBoxService(BoxService $boxService): BaseTest
    {
        $this->boxService = $boxService;
        return $this;
    }

}