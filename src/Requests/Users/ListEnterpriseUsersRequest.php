<?php

namespace Mitquinn\BoxApiSdk\Requests\Users;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Psr\Http\Message\RequestInterface;

/**
 * Class ListEnterpriseUsersRequest
 * @package Mitquinn\BoxApiSdk\Requests\Users
 */
class ListEnterpriseUsersRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListEnterpriseUsersRequest constructor.
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
        return $this->generateUri('users');
    }

    /**
     * @inheritDoc
     */
    public function validateQuery(array $query): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function validateBody(array $body): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function validateHeader(array $header): bool
    {
        return true;
    }
}