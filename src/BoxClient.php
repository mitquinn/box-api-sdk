<?php


namespace Mitquinn\BoxApiSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Mitquinn\BoxApiSdk\Interfaces\MakesUserRequestsInterface;
use Mitquinn\BoxApiSdk\Requests\User\GetUserRequest;
use Mitquinn\BoxApiSdk\Traits\MakesAuthorizationRequests;
use Mitquinn\BoxApiSdk\Traits\MakesUserRequests;
use Psr\Http\Client\ClientInterface;

/**
 * Class BoxClient
 * @package Mitquinn\BoxApiSdk
 */
class BoxClient implements MakesUserRequestsInterface
{

    use MakesAuthorizationRequests;
    use MakesUserRequests;

    /** @var BoxConfiguration $boxConfiguration */
    protected BoxConfiguration $boxConfiguration;

    /** @var ClientInterface $client */
    protected ClientInterface $client;

    /** @var string $accessToken */
    protected string $accessToken;

    /**
     * BoxClient constructor.
     * @param BoxConfiguration $boxConfiguration
     * @param ClientInterface|null $client
     */
    public function __construct(BoxConfiguration $boxConfiguration, ClientInterface $client = null)
    {
        $this->setBoxConfiguration($boxConfiguration);
        $accessToken = $this->generateAccessToken();
        if (is_null($client)) {
            $client = new Client([
                'headers' => [
                    'Authorization' => $accessToken
                ]
            ]);

        }
        $this->setClient($client);
    }

    /**
     * @return string
     */
    public function generateAccessToken(): string
    {
        $boxConfiguration = $this->getBoxConfiguration();
        $accessToken = 'Bearer tCC5nsIG8qYOphfmVpwEWUQve6WmL2Kp';
        $this->setAccessToken($accessToken);
        return $accessToken;
    }

    public function generateServiceAccountToken()
    {
//        $privateKey = env('BOX_SERVICE_ACCOUNT_PRIVATE_KEY');
//        $passphrase = env('BOX_SERVICE_ACCOUNT_PASSPHRASE');
//        $key = openssl_pkey_get_private($privateKey, $passphrase);
//
//        $authenticationUrl = 'https://api.box.com/oauth2/token';
//
//        $claims = [
//            'iss' => env('BOX_SERVICE_ACCOUNT_CLIENT_ID'),
//            'sub' => env('BOX_SERVICE_ACCOUNT_ENTERPRISE_ID'),
//            'box_sub_type' => 'enterprise',
//            'aud' => $authenticationUrl,
//            'jti' => base64_encode(random_bytes(64)),
//            'exp' => time() + 45,
//            'kid' => env('BOX_SERVICE_ACCOUNT_PUBLIC_KEY_ID')
//        ];
//
//        $assertion = JWT::encode($claims, $key, 'RS512');
//
//        $params = [
//            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
//            'assertion' => $assertion,
//            'client_id' => env('BOX_SERVICE_ACCOUNT_CLIENT_ID'),
//            'client_secret' => env('BOX_SERVICE_ACCOUNT_CLIENT_SECRET')
//        ];
//
//
//        $client = new Client();
//        try {
//            $response = $client->request('POST', $authenticationUrl, [
//                'form_params' => $params
//            ]);
//
//            $body = json_decode($response->getBody()->getContents(), true);
//            $serviceAccountAccessToken = $body['access_token'];
//            $this->setBoxServiceAccountAccessToken($serviceAccountAccessToken);
//            Cache::add('BOX_SERVICE_ACCOUNT_ACCESS_TOKEN', $serviceAccountAccessToken, 3000);
//            return true;
//        } catch (GuzzleException $guzzleException) {
//            $this->getLogger()->error($guzzleException->getMessage(), $guzzleException->getTrace());
//            return false;
//        } catch (Exception $exception) {
//            $this->getLogger()->error($exception->getMessage(), $exception->getTrace());
//            return false;
//        }
    }




    /*** Start Getters and Setters ***/

    /**
     * @return BoxConfiguration
     */
    public function getBoxConfiguration(): BoxConfiguration
    {
        return $this->boxConfiguration;
    }

    /**
     * @param BoxConfiguration $boxConfiguration
     * @return BoxClient
     */
    public function setBoxConfiguration(BoxConfiguration $boxConfiguration): BoxClient
    {
        $this->boxConfiguration = $boxConfiguration;
        return $this;
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     * @return BoxClient
     */
    public function setClient(ClientInterface $client): BoxClient
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return BoxClient
     */
    public function setAccessToken(string $accessToken): BoxClient
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /*** End Getters and Setters ***/

}