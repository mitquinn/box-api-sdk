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

    protected string $method = 'GET';

    public function __construct(array $query = [])
    {
        parent::__construct(query: $query);
    }

    public function getUri(): string
    {
        return $this->generateUri('users');
    }

}