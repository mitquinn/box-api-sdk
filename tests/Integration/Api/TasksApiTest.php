<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;


use Mitquinn\BoxApiSdk\Requests\Tasks\CreateTaskRequest;
use Mitquinn\BoxApiSdk\Requests\Tasks\RemoveTaskRequest;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Resources\Tasks\Task;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;

/**
 * Class TasksApiTest
 * @package Mitquinn\BoxApiSdk\Tests\Integration\Api
 */
class TasksApiTest extends BaseTest
{

    public function deleteTask($task_id)
    {
        $request = new RemoveTaskRequest($task_id);
        $noContent = $this->getBoxService()->tasks()->removeTask($request);
        static::assertInstanceOf(NoContent::class, $noContent);
    }


    public function testCreateTask()
    {
        $file = $this->uploadFile();

        $body = [
            'item' => [
                'id' => (string)$file->getId(),
                'type' => 'file'
            ]
        ];

        $request = new CreateTaskRequest($body);
        $task = $this->getBoxService()->tasks()->createTask($request);
        static::assertInstanceOf(Task::class, $task);

        $this->deleteTask($task->getId());
        $this->deleteFile($file->getId());
    }

}