<?php

namespace Mitquinn\BoxApiSdk\Requests\Tasks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class CreateTaskRequest
 * @package Mitquinn\BoxApiSdk\Requests\Tasks
 */
class CreateTaskRequest extends BaseRequest
{

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CreateTaskRequest constructor.
     * @param array $body
     */
    public function __construct(array $body)
    {
        parent::__construct(body: $body);
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('tasks');
    }
}