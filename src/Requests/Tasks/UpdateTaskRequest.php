<?php

namespace Mitquinn\BoxApiSdk\Requests\Tasks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateTaskRequest
 * @package Mitquinn\BoxApiSdk\Requests\Tasks
 */
class UpdateTaskRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateTaskRequest constructor.
     * @param int $task_id
     * @param array $body
     */
    public function __construct(int $task_id, array $body = [])
    {
        $this->setId($task_id);
        parent::__construct(body:  $body);
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