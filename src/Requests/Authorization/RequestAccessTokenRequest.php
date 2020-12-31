<?php

namespace Mitquinn\BoxApiSdk\Requests\Authorization;

use GuzzleHttp\Psr7\Request;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Psr\Http\Message\RequestInterface;

/**
 * Class RequestAccessTokenRequest
 * @package Mitquinn\BoxApiSdk\Requests\Authorization
 */
class RequestAccessTokenRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'POST';

    /** @var array|string[] $header */
    protected array $header = [
        'Content-Type' => 'application/x-www-form-urlencoded'
    ];

    /** @var string $actor_token */
    protected string $actor_token;

    /** @var string $actor_token_type */
    protected string $actor_token_type = 'urn:ietf:params:oauth:token-type:id_token';

    /** @var string $assertion */
    protected string $assertion;

    /** @var string $client_id */
    protected string $client_id;

    /** @var string $client_secret */
    protected string $client_secret;

    /** @var string $code */
    protected string $code;

    /** @var string $grant_type */
    protected string $grant_type;

    /** @var string $refresh_token */
    protected string $refresh_token;

    /** @var string $resource */
    protected string $resource;

    /** @var string $scope */
    protected string $scope;

    /** @var string $subject_token */
    protected string $subject_token;

    /** @var string $subject_token_type */
    protected string $subject_token_type = 'urn:ietf:params:oauth:token-type:access_token';

    public function __construct(
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
    ) {
        $this->setActorToken($actor_token);
        $this->setActorTokenType($actor_token_type);
        $this->setAssertion($assertion);
        $this->setClientId($client_id);
        $this->setClientSecret($client_secret);
        $this->setCode($code);
        $this->setGrantType($grant_type);
        $this->setRefreshToken($refresh_token);
        $this->setResource($resource);
        $this->setScope($scope);
        $this->setSubjectToken($subject_token);
        $this->setSubjectTokenType($subject_token_type);
    }


    public function getUri(): string
    {
        return parent::getBaseUri().'oauth2/token';
    }

    /**
     * @return RequestInterface
     * @throws \Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException
     */
    public function generateRequestInterface(): RequestInterface
    {
        return new Request(
            $this->getMethod(),
            $this->getUri(),
            $this->getHeader(),
            $this->getUrlEncodedBody()
        );
    }

    protected function getUrlEncodedBody(): string
    {
        $body = [];
        if (!empty($this->getActorToken())) {
            $body['actor_token'] = $this->getActorToken();
        }

        if (!empty($this->getActorTokenType())) {
            $body['actor_token_type'] = $this->getActorTokenType();
        }

        if (!empty($this->getAssertion())) {
            $body['assertion'] = $this->getAssertion();
        }

        if (!empty($this->getClientId())) {
            $body['client_id'] = $this->getClientId();
        }

        if (!empty($this->getClientSecret())) {
            $body['client_secret'] = $this->getClientSecret();
        }

        if (!empty($this->getCode())) {
            $body['code'] = $this->getCode();
        }

        if (!empty($this->getGrantType())) {
            $body['grant_type'] = $this->getGrantType();
        }

        if (!empty($this->getRefreshToken())) {
            $body['refresh_token'] = $this->getRefreshToken();
        }

        if (!empty($this->getResource())) {
            $body['resource'] = $this->getResource();
        }

        if (!empty($this->getScope())) {
            $body['scope'] = $this->getScope();
        }

        if (!empty($this->getSubjectToken())) {
            $body['subject_token'] = $this->getSubjectToken();
        }

        if (!empty($this->getSubjectTokenType())) {
            $body['subject_token_type'] = $this->getSubjectTokenType();
        }

         return http_build_query($body, null, '&');
    }


    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getActorToken(): string
    {
        return $this->actor_token;
    }

    /**
     * @param string $actor_token
     * @return RequestAccessTokenRequest
     */
    public function setActorToken(string $actor_token): RequestAccessTokenRequest
    {
        $this->actor_token = $actor_token;
        return $this;
    }

    /**
     * @return string
     */
    public function getActorTokenType(): string
    {
        return $this->actor_token_type;
    }

    /**
     * @param string $actor_token_type
     * @return RequestAccessTokenRequest
     */
    public function setActorTokenType(string $actor_token_type): RequestAccessTokenRequest
    {
        $this->actor_token_type = $actor_token_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getAssertion(): string
    {
        return $this->assertion;
    }

    /**
     * @param string $assertion
     * @return RequestAccessTokenRequest
     */
    public function setAssertion(string $assertion): RequestAccessTokenRequest
    {
        $this->assertion = $assertion;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->client_id;
    }

    /**
     * @param string $client_id
     * @return RequestAccessTokenRequest
     */
    public function setClientId(string $client_id): RequestAccessTokenRequest
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->client_secret;
    }

    /**
     * @param string $client_secret
     * @return RequestAccessTokenRequest
     */
    public function setClientSecret(string $client_secret): RequestAccessTokenRequest
    {
        $this->client_secret = $client_secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return RequestAccessTokenRequest
     */
    public function setCode(string $code): RequestAccessTokenRequest
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getGrantType(): string
    {
        return $this->grant_type;
    }

    /**
     * @param string $grant_type
     * @return RequestAccessTokenRequest
     */
    public function setGrantType(string $grant_type): RequestAccessTokenRequest
    {
        $this->grant_type = $grant_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refresh_token;
    }

    /**
     * @param string $refresh_token
     * @return RequestAccessTokenRequest
     */
    public function setRefreshToken(string $refresh_token): RequestAccessTokenRequest
    {
        $this->refresh_token = $refresh_token;
        return $this;
    }

    /**
     * @return string
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * @param string $resource
     * @return RequestAccessTokenRequest
     */
    public function setResource(string $resource): RequestAccessTokenRequest
    {
        $this->resource = $resource;
        return $this;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * @param string $scope
     * @return RequestAccessTokenRequest
     */
    public function setScope(string $scope): RequestAccessTokenRequest
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubjectToken(): string
    {
        return $this->subject_token;
    }

    /**
     * @param string $subject_token
     * @return RequestAccessTokenRequest
     */
    public function setSubjectToken(string $subject_token): RequestAccessTokenRequest
    {
        $this->subject_token = $subject_token;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubjectTokenType(): string
    {
        return $this->subject_token_type;
    }

    /**
     * @param string $subject_token_type
     * @return RequestAccessTokenRequest
     */
    public function setSubjectTokenType(string $subject_token_type): RequestAccessTokenRequest
    {
        $this->subject_token_type = $subject_token_type;
        return $this;
    }

    /*** End Getters and Setters ***/

}