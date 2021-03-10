<?php

namespace Mitquinn\BoxApiSdk\Requests\Tasks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class RemoveTaskRequest
 * @package Mitquinn\BoxApiSdk\Requests\Tasks
 */
class RemoveTaskRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * RemoveTaskRequest constructor.
     * @param string $taskId
     */
    public function __construct(string $taskId)
    {
        $this->setId($taskId);
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'tasks/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}