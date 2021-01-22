<?php

namespace Mitquinn\BoxApiSdk\Requests\GroupMemberships;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetGroupMembershipRequest
 * @package Mitquinn\BoxApiSdk\Requests\GroupMemberships
 */
class GetGroupMembershipRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetGroupMembershipRequest constructor.
     * @param int $id
     * @param array $query
     * @param array $body
     * @param array $header
     */
    public function __construct(int $id, array $query = [], array $body = [], array $header = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body: $body, header: $header);
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