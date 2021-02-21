<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Illuminate\Support\Collection;

/**
 * Class RecentItemsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class RecentItems extends Resource
{

    /** @var RecentItem[] $entries */
    protected array $entries;

    /** @var int $limit */
    protected int $limit;

    /** @var int|null $next_marker */
    protected int|null $next_marker;

    /** @var int|null $prev_marker */
    protected int|null $prev_marker;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        if ($collection->has('entries')) {
            $recentItems = [];
            foreach ($collection->get('entries') as $entry) {
                $recentItems[] = new RecentItem($entry);
            }
            $this->setEntries($recentItems);
        }

        if ($collection->has('limit')) {
            $this->setLimit($collection->get('limit'));
        }

        if ($collection->has('next_marker')) {
            $this->setNextMarker($collection->get('next_marker'));
        }

        if ($collection->has('prev_marker')) {
            $this->setPrevMarker($collection->get('prev_marker'));
        }

        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return RecentItem[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param RecentItem[] $entries
     * @return RecentItems
     */
    public function setEntries(array $entries): RecentItems
    {
        $this->entries = $entries;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return RecentItems
     */
    public function setLimit(int $limit): RecentItems
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNextMarker(): ?int
    {
        return $this->next_marker;
    }

    /**
     * @param int|null $next_marker
     * @return RecentItems
     */
    public function setNextMarker(?int $next_marker): RecentItems
    {
        $this->next_marker = $next_marker;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPrevMarker(): ?int
    {
        return $this->prev_marker;
    }

    /**
     * @param int|null $prev_marker
     * @return RecentItems
     */
    public function setPrevMarker(?int $prev_marker): RecentItems
    {
        $this->prev_marker = $prev_marker;
        return $this;
    }

    /*** End Getters and Setters ***/
}