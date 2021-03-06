<?php

namespace Mitquinn\BoxApiSdk\Requests\Groups;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateGroupRequest
 * @package Mitquinn\BoxApiSdk\Requests\Groups
 */
class UpdateGroupRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateGroupRequest constructor.
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
        $requestSegment = 'groups/'.$this->getId();
        return $this->generateUri($requestSegment);
    }

}