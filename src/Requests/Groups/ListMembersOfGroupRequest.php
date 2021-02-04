<?php

namespace Mitquinn\BoxApiSdk\Requests\Groups;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListMembersOfGroupRequest
 * @package Mitquinn\BoxApiSdk\Requests\Groups
 */
class ListMembersOfGroupRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListMembersOfGroupRequest constructor.
     * @param int $id
     * @param array $query
     */
    public function __construct(int $id, array $query = [])
    {
        $this->setId($id);
        parent::__construct(query: $query);
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'groups/'.$this->getId().'/memberships';
        return $this->generateUri($requestSegment);
    }

}