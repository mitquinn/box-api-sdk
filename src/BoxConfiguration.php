<?php

namespace Mitquinn\BoxApiSdk;

use Mitquinn\BoxApiSdk\Interfaces\BoxConfigurationInterface;

/**
 * Class BoxConfiguration
 * @package Mitquinn\BoxApiSdk
 */
class BoxConfiguration implements BoxConfigurationInterface
{

    /** @var string $clientId **/
    protected string $clientId;

    /** @var string $clientSecret **/
    protected string $clientSecret;

    /** @var string $publicKeyId **/
    protected string $publicKeyId;

    /** @var string $privateKey **/
    protected string $privateKey;

    /** @var string $passphrase **/
    protected string $passphrase;

    /** @var int $enterpriseId **/
    protected int $enterpriseId;

    /**
     * BoxConfiguration constructor.
     * @param string $clientId
     * @param string $clientSecret
     * @param string $publicKeyId
     * @param string $privateKey
     * @param string $passphrase
     * @param int $enterpriseID
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        string $publicKeyId,
        string $privateKey,
        string $passphrase,
        int $enterpriseID
    )
    {
        $this->setClientId($clientId);
        $this->setClientSecret($clientSecret);
        $this->setPublicKeyId($publicKeyId);
        $this->setPrivateKey($privateKey);
        $this->setPassphrase($passphrase);
        $this->setEnterpriseId($enterpriseID);
    }


    /** Getters and Setters */

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     * @return BoxConfiguration
     */
    protected function setClientId(string $clientId): BoxConfiguration
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * @param string $clientSecret
     * @return BoxConfiguration
     */
    protected function setClientSecret(string $clientSecret): BoxConfiguration
    {
        $this->clientSecret = $clientSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublicKeyId(): string
    {
        return $this->publicKeyId;
    }

    /**
     * @param string $publicKeyId
     * @return BoxConfiguration
     */
    protected function setPublicKeyId(string $publicKeyId): BoxConfiguration
    {
        $this->publicKeyId = $publicKeyId;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    /**
     * @param string $privateKey
     * @return BoxConfiguration
     */
    protected function setPrivateKey(string $privateKey): BoxConfiguration
    {
        $this->privateKey = $privateKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassphrase(): string
    {
        return $this->passphrase;
    }

    /**
     * @param string $passphrase
     * @return BoxConfiguration
     */
    protected function setPassphrase(string $passphrase): BoxConfiguration
    {
        $this->passphrase = $passphrase;
        return $this;
    }

    /**
     * @return int
     */
    public function getEnterpriseId(): int
    {
        return $this->enterpriseId;
    }

    /**
     * @param int $enterpriseId
     * @return BoxConfiguration
     */
    protected function setEnterpriseId(int $enterpriseId): BoxConfiguration
    {
        $this->enterpriseId = $enterpriseId;
        return $this;
    }

}