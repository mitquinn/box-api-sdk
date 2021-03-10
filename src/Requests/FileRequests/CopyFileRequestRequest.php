<?php

namespace Mitquinn\BoxApiSdk\Requests\FileRequests;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class CopyFileRequestRequest
 * @package Mitquinn\BoxApiSdk\Requests\FileRequests
 */
class CopyFileRequestRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CopyFileRequestRequest constructor.
     * @param string $id
     * @param array $body
     */
    public function __construct(string $id, array $body)
    {
        $this->setId($id);
        parent::__construct(body: $body);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'file_requests/'.$this->getId().'/copy';
        return $this->generateUri($requestSegment);
    }

}