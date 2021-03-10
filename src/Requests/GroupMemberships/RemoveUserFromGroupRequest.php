<?php

namespace Mitquinn\BoxApiSdk\Requests\GroupMemberships;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class RemoveUserFromGroupRequest
 * @package Mitquinn\BoxApiSdk\Requests\GroupMemberships
 */
class RemoveUserFromGroupRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * RemoveUserFromGroupRequest constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->setId($id);
        parent::__construct();
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