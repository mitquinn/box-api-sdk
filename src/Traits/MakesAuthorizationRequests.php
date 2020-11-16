<?php


namespace Mitquinn\BoxApiSdk\Traits;


use Mitquinn\BoxApiSdk\Requests\Authorization\RequestAccessTokenRequest;
use Mitquinn\BoxApiSdk\Resources\AccessTokenResource;

trait MakesAuthorizationRequests
{


    public function requestAccessToken(
        string $actor_token = '',
        string $actor_token_type = 'urn:ietf:params:oauth:token-type:id_token',
        string $assertion = '',
        string $client_id = '',
        string $client_secret = '',
        string $code = '',
        string $grant_type = '',
        string $refresh_token = '',
        string $resource = '',
        string $scope = '',
        string $subject_token = '',
        string $subject_token_type = 'urn:ietf:params:oauth:token-type:access_token'
    ): AccessTokenResource
    {
        $requestAccessTokenRequest = new RequestAccessTokenRequest(
            $actor_token,
            $actor_token_type,
            $assertion,
            $client_id,
            $client_secret,
            $code,
            $grant_type,
            $refresh_token,
            $resource,
            $scope, $subject_token,
            $subject_token_type
        );



        $request = $requestAccessTokenRequest->generateRequestInterface();
        $client = $this->getClient();



    }

    public function refreshAccessToken(): AccessTokenResource
    {

    }


    public function revokeAccessToken(): bool
    {

    }



}