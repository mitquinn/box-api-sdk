<?php

namespace Mitquinn\BoxApiSdk\Requests\FileRequests;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateFileRequestRequest
 * @package Mitquinn\BoxApiSdk\Requests\FileRequests
 */
class UpdateFileRequestRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    public function __construct(int $id, array $body = [], array $header = [])
    {
        $this->setId($id);
        parent::__construct(body: $body, header: $header);
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'file_requests/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}