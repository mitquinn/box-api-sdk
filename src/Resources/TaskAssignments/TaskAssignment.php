<?php

namespace Mitquinn\BoxApiSdk\Resources\TaskAssignments;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\File;
use Mitquinn\BoxApiSdk\Resources\Resource;
use Mitquinn\BoxApiSdk\Resources\User;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class TaskAssignment
 * @package Mitquinn\BoxApiSdk\Resources\TaskAssignments
 */
class TaskAssignment extends Resource
{
    use HasId, HasType;

    /** @var string $assigned_at */
    protected string $assigned_at;

    /**
     * Todo: Switch to UserMini
     * @var User $assigned_by
     */
    protected User $assigned_by;

    /**
     * Todo: Switch to UserMini
     * @var User $assigned_to
     */
    protected User $assigned_to;

    /** @var string $completed_at */
    protected string $completed_at;

    /**
     * Todo: Switch to FileMini
     * @var File $item
     */
    protected File $item;

    /** @var string $message */
    protected string $message;

    /** @var string $reminded_at */
    protected string $reminded_at;

    /** @var string $resolution_state */
    protected string $resolution_state;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        if ($collection->has('id')) {
            $this->setId($collection->get('id'));
        }

        if ($collection->has('type')) {
            $this->setType($collection->get('type'));
        }

        if ($collection->has('assigned_at')) {
            $this->setAssignedAt($collection->get('assigned_at'));
        }

        if ($collection->has('assigned_by')) {
            $this->setAssignedBy(new User($collection->get('assigned_by')));
        }

        if ($collection->has('assigned_by')) {
            $this->setAssignedBy(new User($collection->get('assigned_by')));
        }

        if ($collection->has('assigned_to')) {
            $this->setAssignedTo(new User($collection->get('assigned_to')));
        }

        if ($collection->has('completed_at')) {
            $this->setCompletedAt($collection->get('completed_at'));
        }

        if ($collection->has('item')) {
            $this->setItem(new File($collection->get('item')));
        }

        if ($collection->has('message')) {
            $this->setMessage($collection->get('message'));
        }

        if ($collection->has('reminded_at')) {
            $this->setRemindedAt($collection->get('reminded_at'));
        }

        if ($collection->has('resolution_state')) {
            $this->setResolutionState($collection->get('resolution_state'));
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getAssignedAt(): string
    {
        return $this->assigned_at;
    }

    /**
     * @param string $assigned_at
     * @return TaskAssignment
     */
    public function setAssignedAt(string $assigned_at): TaskAssignment
    {
        $this->assigned_at = $assigned_at;
        return $this;
    }

    /**
     * @return User
     */
    public function getAssignedBy(): User
    {
        return $this->assigned_by;
    }

    /**
     * @param User $assigned_by
     * @return TaskAssignment
     */
    public function setAssignedBy(User $assigned_by): TaskAssignment
    {
        $this->assigned_by = $assigned_by;
        return $this;
    }

    /**
     * @return User
     */
    public function getAssignedTo(): User
    {
        return $this->assigned_to;
    }

    /**
     * @param User $assigned_to
     * @return TaskAssignment
     */
    public function setAssignedTo(User $assigned_to): TaskAssignment
    {
        $this->assigned_to = $assigned_to;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompletedAt(): string
    {
        return $this->completed_at;
    }

    /**
     * @param string $completed_at
     * @return TaskAssignment
     */
    public function setCompletedAt(string $completed_at): TaskAssignment
    {
        $this->completed_at = $completed_at;
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
     * @return TaskAssignment
     */
    public function setItem(File $item): TaskAssignment
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
     * @return TaskAssignment
     */
    public function setMessage(string $message): TaskAssignment
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemindedAt(): string
    {
        return $this->reminded_at;
    }

    /**
     * @param string $reminded_at
     * @return TaskAssignment
     */
    public function setRemindedAt(string $reminded_at): TaskAssignment
    {
        $this->reminded_at = $reminded_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getResolutionState(): string
    {
        return $this->resolution_state;
    }

    /**
     * @param string $resolution_state
     * @return TaskAssignment
     */
    public function setResolutionState(string $resolution_state): TaskAssignment
    {
        $this->resolution_state = $resolution_state;
        return $this;
    }

    /*** End Getters and Setters ***/

}