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
        $requestSegment = 'groups/'.$this->getId().'/collaborations';
        return $this->generateUri($requestSegment);
    }
}