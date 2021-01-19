<?php

namespace Mitquinn\BoxApiSdk\Requests\Groups;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListGroupCollaborationsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Groups
 */
class ListGroupCollaborationsRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListGroupCollaborationsRequest constructor.
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
        $requestSegment = 'groups/'.$this->getId().'/collaborations';
        return $this->generateUri($requestSegment);
    }
}