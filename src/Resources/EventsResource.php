<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class EventsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class EventsResource extends BaseResource
{

    /** @var int $chunk_size */
    protected int $chunk_size;

    /** @var EventResource[] $entries */
    protected array $entries;

    /** @var string $next_stream_position */
    protected string $next_stream_position;

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        if (array_key_exists('chunk_size', $response)) {
            $this->setChunkSize($response['chunk_size']);
        }

        if (array_key_exists('entries', $response)) {
            $entries = [];
            foreach ($response['entries'] as $entry) {
                $entries[] = new EventResource($entry);
            }
            $this->setEntries($entries);
        }

        if (array_key_exists('next_stream_position', $response)) {
            $this->setNextStreamPosition($response['next_stream_position']);
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
     * @return EventsResource
     */
    public function setChunkSize(int $chunk_size): EventsResource
    {
        $this->chunk_size = $chunk_size;
        return $this;
    }

    /**
     * @return EventResource[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param EventResource[] $entries
     * @return EventsResource
     */
    public function setEntries(array $entries): EventsResource
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
     * @return EventsResource
     */
    public function setNextStreamPosition(string $next_stream_position): EventsResource
    {
        $this->next_stream_position = $next_stream_position;
        return $this;
    }

    /*** End Getters and Setters ***/

}