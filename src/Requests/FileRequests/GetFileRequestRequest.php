<?php

namespace Mitquinn\BoxApiSdk\Requests\FileRequests;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetFileRequestRequest
 * @package Mitquinn\BoxApiSdk\Requests\FileRequests
 */
class GetFileRequestRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetFileRequestRequest constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->setId($id);
        parent::__construct();
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