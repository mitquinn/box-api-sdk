<?php

namespace Mitquinn\BoxApiSdk\Resources\Events;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\Resource;

/**
 * Class EventsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class Events extends Resource
{

    /** @var int $chunk_size */
    protected int $chunk_size;

    /** @var Event[] $entries */
    protected array $entries;

    /** @var string $next_stream_position */
    protected string $next_stream_position;

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        $this->setProperties($collection);

        if ($collection->has('entries')) {
            $entries = [];
            foreach ($collection->get($entries) as $entry) {
                $entries[] = new Event($entry);
            }
            $this->setEntries($entries);
        }

        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return int
     */
    public function getChunkSize(): int
    {
        return $this->chunk_size;
    }

    /**
     * @param int $chunk_size
     * @return Events
     */
    public function setChunkSize(int $chunk_size): Events
    {
        $this->chunk_size = $chunk_size;
        return $this;
    }

    /**
     * @return Event[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param Event[] $entries
     * @return Events
     */
    public function setEntries(array $entries): Events
    {
        $this->entries = $entries;
        return $this;
    }

    /**
     * @return string
     */
    public function getNextStreamPosition(): string
    {
        return $this->next_stream_position;
    }

    /**
     * @param string $next_stream_position
     * @return Events
     */
    public function setNextStreamPosition(string $next_stream_position): Events
    {
        $this->next_stream_position = $next_stream_position;
        return $this;
    }

    /*** End Getters and Setters ***/

}