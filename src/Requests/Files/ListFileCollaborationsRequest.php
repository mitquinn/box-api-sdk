<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListFileCollaborationsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Files
 */
class ListFileCollaborationsRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

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
        $requestSegment = 'files/'.$this->getId().'/collaborations';
        return $this->generateUri($requestSegment);
    }
}