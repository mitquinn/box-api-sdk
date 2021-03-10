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
     * @param string $taskId
     * @param array $body
     */
    public function __construct(string $taskId, array $body = [])
    {
        $this->setId($taskId);
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