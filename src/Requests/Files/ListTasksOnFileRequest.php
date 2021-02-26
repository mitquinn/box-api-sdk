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
     * @param int $file_id
     */
    public function __construct(int $file_id)
    {
        $this->setId($file_id);
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