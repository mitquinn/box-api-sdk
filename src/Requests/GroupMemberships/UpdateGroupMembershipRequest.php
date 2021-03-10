<?php

namespace Mitquinn\BoxApiSdk\Requests\GroupMemberships;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateGroupMembershipRequest
 * @package Mitquinn\BoxApiSdk\Requests\GroupMemberships
 */
class UpdateGroupMembershipRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateGroupMembershipRequest constructor.
     * @param string $id
     * @param array $query
     * @param array $body
     */
    public function __construct(string $id, array $query = [], array $body = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body: $body);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'group_memberships/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}