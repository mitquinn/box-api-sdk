<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class CopyFileRequest
 * @package Mitquinn\BoxApiSdk\Requests\Files
 */
class CopyFileRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CopyFileRequest constructor.
     * @param int $id
     * @param array $body
     * @param array $query
     */
    public function __construct(int $id, array $body, array $query = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body: $body);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'files/'.$this->getId().'/copy';
        return $this->generateUri($requestSegment);
    }
}