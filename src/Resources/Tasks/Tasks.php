<?php

namespace Mitquinn\BoxApiSdk\Resources\Tasks;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\Resource;
use Mitquinn\BoxApiSdk\Traits\HasResourcePropertyChecks;

/**
 * Class Tasks
 * @package Mitquinn\BoxApiSdk\Resources\Tasks
 */
class Tasks extends Resource
{

    /** @var Task[] $entries */
    protected array $entries;

    /** @var int $total_count */
    protected int $total_count;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        $this->setProperties($collection);

        if ($collection->has('entries')) {
            $tasks = [];
            foreach ($collection->get('entries') as $task) {
                $tasks[] = new Task($task);
            }
            $this->setEntries($tasks);
        }

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return Task[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param Task[] $entries
     * @return Tasks
     */
    public function setEntries(array $entries): Tasks
    {
        $this->entries = $entries;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     * @return Tasks
     */
    public function setTotalCount(int $total_count): Tasks
    {
        $this->total_count = $total_count;
        return $this;
    }

    /*** End Getters and Setters ***/
}