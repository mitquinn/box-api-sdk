<?php

namespace Mitquinn\BoxApiSdk\Requests\Tasks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetTaskRequest
 * @package Mitquinn\BoxApiSdk\Requests\Tasks
 */
class GetTaskRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetTaskRequest constructor.
     * @param int $task_id
     */
    public function __construct(int $task_id)
    {
        $this->setId($task_id);
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