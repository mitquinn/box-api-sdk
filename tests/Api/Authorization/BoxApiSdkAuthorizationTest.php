<?php

namespace Mitquinn\BoxApiSdk\Tests\Api\Authorization;

use Firebase\JWT\JWT;
use Mitquinn\BoxApiSdk\Requests\Authorization\RequestAccessTokenRequest;
use Mitquinn\BoxApiSdk\Tests\Api\BoxApiSdkBaseTest;

/**
 * Class BoxApiSdkAuthorizationTest
 * @package Api\Authorization
 */
class BoxApiSdkAuthorizationTest extends BoxApiSdkBaseTest
{

    public function testRequestAccessToken()
    {
        $privateKey = $this->getBoxConfiguration()->getPrivateKey();
        $passphrase = $this->getBoxConfiguration()->getPassphrase();
        $key = openssl_pkey_get_private($privateKey, $passphrase);

        $claims = [
            'iss' => $this->getBoxConfiguration()->getClientId(),
            'sub' => $this->getBoxConfiguration()->getEnterpriseId(),
            'box_sub_type' => 'enterprise',
            'aud' => 'https://api.box.com/oauth/token',
            'jti' => base64_encode(random_bytes(64)),
            'exp' => time() + 45,
            'kid' => $this->getBoxConfiguration()->getPublicKeyId(),
        ];

        $assertion = JWT::encode($claims, $key, 'RS512');

        $requestAccessTokenRequest = new RequestAccessTokenRequest(
            null,
            null,
            $assertion,
            $this->getBoxConfiguration()->getClientId(),
            $this->getBoxConfiguration()->getClientSecret(),
            null,
            'urn:ietf:params:oauth:grant-type:jwt-bearer'
        );

        $requestInterface = $requestAccessTokenRequest->generateRequestInterface();

        $response = $this->getBoxClient()->getClient()->sendRequest($requestInterface);


    }

}
