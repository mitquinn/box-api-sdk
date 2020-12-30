<?php

namespace Mitquinn\BoxApiSdk\AuthorizationConfigurations;

use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Mitquinn\BoxApiSdk\Interfaces\AuthorizationInterface;
use function Couchbase\defaultDecoder;

/**
 * Class BoxConfiguration
 * @package Mitquinn\BoxApiSdk
 */
class ServerAuthorization implements AuthorizationInterface
{
    /** @var string $authorizationUrl */
    protected string $authorizationUrl;

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

    /** @var string $enterpriseId **/
    protected string $enterpriseId;

    /**
     * BoxConfiguration constructor.
     * @param string $clientId
     * @param string $clientSecret
     * @param string $publicKeyId
     * @param string $privateKey
     * @param string $passphrase
     * @param int $enterpriseID
     * @param string $authorizationUrl
     */
    public function __construct(
        string $clientId,
        string $clientSecret,
        string $publicKeyId,
        string $privateKey,
        string $passphrase,
        int $enterpriseID,
        string $authorizationUrl = 'https://api.box.com/oauth2/token'
    )
    {
        $this->setClientId($clientId);
        $this->setClientSecret($clientSecret);
        $this->setPublicKeyId($publicKeyId);
        $this->setPrivateKey($privateKey);
        $this->setPassphrase($passphrase);
        $this->setEnterpriseId($enterpriseID);
        $this->setAuthorizationUrl($authorizationUrl);
    }

    public function getAuthorizationRequest(): Request
    {
        $key = openssl_pkey_get_private($this->getPrivateKey(), $this->getPassphrase());

        $claims = [
            'iss' => $this->getClientId(),
            'sub' => $this->getEnterpriseId(),
            'box_sub_type' => 'enterprise',
            'aud' => $this->getAuthorizationUrl(),
            'jti' => base64_encode(random_bytes(64)),
            'exp' => time() + 45,
            'kid' => $this->getPublicKeyId()
        ];

        $assertion = JWT::encode($claims, $key, 'RS512');

        $params = [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $assertion,
            'client_id' => $this->getClientId(),
            'client_secret' => $this->getClientSecret()
        ];

        return new Request(
            'POST',
            $this->getAuthorizationUrl(),
            [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            http_build_query($params, null, '&')
        );
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
     * @return ServerAuthorization
     */
    protected function setClientId(string $clientId): ServerAuthorization
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
     * @return ServerAuthorization
     */
    protected function setClientSecret(string $clientSecret): ServerAuthorization
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
     * @return ServerAuthorization
     */
    protected function setPublicKeyId(string $publicKeyId): ServerAuthorization
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
     * @return ServerAuthorization
     */
    protected function setPrivateKey(string $privateKey): ServerAuthorization
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
     * @return ServerAuthorization
     */
    protected function setPassphrase(string $passphrase): ServerAuthorization
    {
        $this->passphrase = $passphrase;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnterpriseId(): string
    {
        return $this->enterpriseId;
    }

    /**
     * @param string $enterpriseId
     * @return ServerAuthorization
     */
    protected function setEnterpriseId(string $enterpriseId): ServerAuthorization
    {
        $this->enterpriseId = $enterpriseId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorizationUrl(): string
    {
        return $this->authorizationUrl;
    }

    /**
     * @param string $authorizationUrl
     * @return ServerAuthorization
     */
    public function setAuthorizationUrl(string $authorizationUrl): ServerAuthorization
    {
        $this->authorizationUrl = $authorizationUrl;
        return $this;
    }

}