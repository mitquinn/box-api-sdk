<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class AccessTokenResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class AccessTokenResource
{
    /** @var string $access_token */
    protected string $access_token;

    /** @var int $expires_in */
    protected int $expires_in;

    /** @var string $issued_token_type */
    protected string $issued_token_type = 'urn:ietf:params:oauth:token-type:access_token';

    /** @var string $refresh_token */
    protected string $refresh_token;

    /** @var array|string[] $restricted_to */
    protected array $restricted_to = [
        'scope' => '',
        'object' => ''
    ];

    /** @var string $token_type */
    protected string $token_type = 'bearer';

    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     * @return AccessTokenResource
     */
    public function setAccessToken(string $access_token): AccessTokenResource
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int
    {
        return $this->expires_in;
    }

    /**
     * @param int $expires_in
     * @return AccessTokenResource
     */
    public function setExpiresIn(int $expires_in): AccessTokenResource
    {
        $this->expires_in = $expires_in;
        return $this;
    }

    /**
     * @return string
     */
    public function getIssuedTokenType(): string
    {
        return $this->issued_token_type;
    }

    /**
     * @param string $issued_token_type
     * @return AccessTokenResource
     */
    public function setIssuedTokenType(string $issued_token_type): AccessTokenResource
    {
        $this->issued_token_type = $issued_token_type;
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
     * @return AccessTokenResource
     */
    public function setRefreshToken(string $refresh_token): AccessTokenResource
    {
        $this->refresh_token = $refresh_token;
        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getRestrictedTo()
    {
        return $this->restricted_to;
    }

    /**
     * @param array|string[] $restricted_to
     * @return AccessTokenResource
     */
    public function setRestrictedTo($restricted_to)
    {
        $this->restricted_to = $restricted_to;
        return $this;
    }

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->token_type;
    }

    /**
     * @param string $token_type
     * @return AccessTokenResource
     */
    public function setTokenType(string $token_type): AccessTokenResource
    {
        $this->token_type = $token_type;
        return $this;
    }

    /*** End Getters and Setters ***/

}