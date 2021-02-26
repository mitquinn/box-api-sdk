<?php

namespace Mitquinn\BoxApiSdk\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Requests\Tasks\CreateTaskRequest;
use Mitquinn\BoxApiSdk\Requests\Tasks\GetTaskRequest;
use Mitquinn\BoxApiSdk\Requests\Tasks\RemoveTaskRequest;
use Mitquinn\BoxApiSdk\Requests\Tasks\UpdateTaskRequest;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Resources\Tasks\Task;
use Mitquinn\BoxApiSdk\Resources\Tasks\Tasks as TasksResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class Tasks
 * @package Mitquinn\BoxApiSdk\Api
 */
class Tasks extends Api
{



    /**
     * @param GenericRequest|GetTaskRequest $request
     * @return Task
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getTask(GenericRequest|GetTaskRequest $request): Task
    {
        return $this->sendTaskRequest($request);
    }

    /**
     * @param GenericRequest|CreateTaskRequest $request
     * @return Task
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createTask(GenericRequest|CreateTaskRequest $request): Task
    {
        return $this->sendTaskRequest($request);
    }

    /**
     * @param GenericRequest|UpdateTaskRequest $request
     * @return Task
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateTask(GenericRequest|UpdateTaskRequest $request): Task
    {
        return $this->sendTaskRequest($request);
    }


    /**
     * @param GenericRequest|RemoveTaskRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeTask(GenericRequest|RemoveTaskRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return Task
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendTaskRequest(BaseRequest $request): Task
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new Task($response);
    }



}