<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateFileRequest
 * @package Mitquinn\BoxApiSdk\Requests\Files
 */
class UpdateFileRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateFileRequest constructor.
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
        $requestSegment = 'files/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}