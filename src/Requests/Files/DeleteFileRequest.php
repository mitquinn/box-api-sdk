<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class DeleteFileRequest
 * @package Mitquinn\BoxApiSdk\Requests\Files
 */
class DeleteFileRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * DeleteFileRequest constructor.
     * @param string $id
     * @param array $header
     */
    public function __construct(string $id, array $header = [])
    {
        $this->setId(id: $id);
        parent::__construct(header: $header);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'files/'.$this->getId();
        return $this->generateUri(requestSegment: $requestSegment);
    }
}