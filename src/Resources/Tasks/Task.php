<?php

namespace Mitquinn\BoxApiSdk\Resources\Tasks;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\File;
use Mitquinn\BoxApiSdk\Resources\Resource;
use Mitquinn\BoxApiSdk\Resources\User;
use Mitquinn\BoxApiSdk\Traits\HasResourcePropertyChecks;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class Task
 * @package Mitquinn\BoxApiSdk\Resources\Tasks
 */
class Task extends Resource
{
    use HasId, HasType, HasCreatedAt, HasCreatedBy;

    /** @var string $action */
    protected string $action;

    /** @var string $completion_rule */
    protected string $completion_rule;

    /** @var string|null $due_at */
    protected string|null $due_at;

    /** @var bool $is_complete */
    protected bool $is_complete;

    /**
     * Todo: change to File Mini when created.
     * @var File
     */
    protected File $item;

    /** @var string $message */
    protected string $message;

    /**
     * Todo: change to task assignment resource when created.
     * @var array
     */
    protected array $task_assignment_collection;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        $this->setProperties($collection);

        //Todo: Convert to user mini
        if ($collection->has('created_by')) {
            $this->setCreatedBy(new User($collection->get('created_by')));
        }

        if ($collection->has('item')) {
            $this->setItem(new File($collection->get('item')));
        }

        //Todo: Change to Task Assignment when created.
        if ($collection->has('task_assignment_collection')) {
            $this->setTaskAssignmentCollection($collection->get('task_assignment_collection'));
        }

        return $this;
    }


    /*** Start Getters and Setters ***/


    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param string $action
     * @return Task
     */
    public function setAction(string $action): Task
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompletionRule(): string
    {
        return $this->completion_rule;
    }

    /**
     * @param string $completion_rule
     * @return Task
     */
    public function setCompletionRule(string $completion_rule): Task
    {
        $this->completion_rule = $completion_rule;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDueAt(): ?string
    {
        return $this->due_at;
    }

    /**
     * @param string|null $due_at
     * @return Task
     */
    public function setDueAt(?string $due_at): Task
    {
        $this->due_at = $due_at;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsComplete(): bool
    {
        return $this->is_complete;
    }

    /**
     * @param bool $is_complete
     * @return Task
     */
    public function setIsComplete(bool $is_complete): Task
    {
        $this->is_complete = $is_complete;
        return $this;
    }

    /**
     * @return File
     */
    public function getItem(): File
    {
        return $this->item;
    }

    /**
     * @param File $item
     * @return Task
     */
    public function setItem(File $item): Task
    {
        $this->item = $item;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return Task
     */
    public function setMessage(string $message): Task
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array
     */
    public function getTaskAssignmentCollection(): array
    {
        return $this->task_assignment_collection;
    }

    /**
     * @param array $task_assignment_collection
     * @return Task
     */
    public function setTaskAssignmentCollection(array $task_assignment_collection): Task
    {
        $this->task_assignment_collection = $task_assignment_collection;
        return $this;
    }

    /*** End Getters and Setters ***/

}