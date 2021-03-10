<?php

namespace Mitquinn\BoxApiSdk\Requests\Users;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListUsersGroupsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Users
 */
class ListUsersGroupsRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListUsersGroupsRequest constructor.
     * @param string $id
     * @param array $query
     */
    public function __construct(string $id, array $query = [])
    {
        $this->setId($id);
        parent::__construct(query: $query);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'users/'.$this->getId().'/memberships';
        return $this->generateUri($requestSegment);
    }
}