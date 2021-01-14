<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class CopyFileRequest
 * @package Mitquinn\BoxApiSdk\Requests\Files
 */
class CopyFileRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CopyFileRequest constructor.
     * @param int $id
     * @param array $body
     * @param array $query
     * @param array $header
     */
    public function __construct(int $id, array $body, array $query = [], array $header = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body: $body, header: $header);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'files/'.$this->getId().'/copy';
        return $this->generateUri($requestSegment);
    }
}