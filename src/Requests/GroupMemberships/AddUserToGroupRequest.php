<?php

namespace Mitquinn\BoxApiSdk\Requests\GroupMemberships;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class AddUserToGroupRequest
 * @package Mitquinn\BoxApiSdk\Requests\GroupMemberships
 */
class AddUserToGroupRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'POST';

    /**
     * AddUserToGroupRequest constructor.
     * @param array $body
     * @param array $query
     */
    public function __construct(array $body, array $query = [])
    {
        parent::__construct(query: $query, body: $body);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('group_memberships');
    }
}