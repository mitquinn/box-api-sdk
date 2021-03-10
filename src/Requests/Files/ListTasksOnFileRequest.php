<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListTasksOnFileRequest
 * @package Mitquinn\BoxApiSdk\Requests\Tasks
 */
class ListTasksOnFileRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListTasksOnFileRequest constructor.
     * @param string $fileId
     */
    public function __construct(string $fileId)
    {
        $this->setId($fileId);
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'files/'.$this->getId().'/tasks';
        return $this->generateUri($requestSegment);
    }
}