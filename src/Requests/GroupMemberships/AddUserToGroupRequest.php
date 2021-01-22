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
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('group_memberships');
    }
}