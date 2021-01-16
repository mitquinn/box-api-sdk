<?php

namespace Mitquinn\BoxApiSdk\Requests\Collaborations;

use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class RemoveCollaborationRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collaborations
 */
class RemoveCollaborationRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * RemoveCollaborationRequest constructor.
     * @param int $id
     * @param array $query
     * @param array $body
     * @param array $header
     */
    public function __construct(int $id, array $query = [], array $body = [], array $header = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body:  $body, header: $header);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'collaborations/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}