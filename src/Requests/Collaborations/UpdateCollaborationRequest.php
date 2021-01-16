<?php

namespace Mitquinn\BoxApiSdk\Requests\Collaborations;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateCollaborationRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collaborations
 */
class UpdateCollaborationRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateCollaborationRequest constructor.
     * @param int $id
     * @param array $body
     * @param array $query
     * @param array $header
     */
    public function __construct(int $id, array $query = [], array $body = [], array $header = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body:  $body, header:  $header);
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