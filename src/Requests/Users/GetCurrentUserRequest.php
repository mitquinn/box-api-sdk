<?php

namespace Mitquinn\BoxApiSdk\Requests\Users;

use GuzzleHttp\Psr7\Request;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Psr\Http\Message\RequestInterface;

/**
 * Class GetCurrentUserRequest
 * @package Mitquinn\BoxApiSdk\Requests\Users
 */
class GetCurrentUserRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetCurrentUserRequest constructor.
     * @param array $query
     */
    public function __construct(array $query = [])
    {
        parent::__construct(query: $query);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri(requestSegment: 'users/me');
    }

}