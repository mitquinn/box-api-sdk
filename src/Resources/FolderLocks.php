<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Illuminate\Support\Collection;

/**
 * Class FolderLocksResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class FolderLocks extends Resource
{

    /** @var FolderLock[] $entries */
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
            $folderLocks = [];
            foreach ($collection->get('entries') as $entry) {
                $folderLocks[] = new FolderLock($entry);
            }
            $this->setEntries($folderLocks);
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
     * @return FolderLock[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param FolderLock[] $entries
     * @return FolderLocks
     */
    public function setEntries(array $entries): FolderLocks
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
     * @return FolderLocks
     */
    public function setLimit(int $limit): FolderLocks
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
     * @return FolderLocks
     */
    public function setNextMarker(?int $next_marker): FolderLocks
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
     * @return FolderLocks
     */
    public function setPrevMarker(?int $prev_marker): FolderLocks
    {
        $this->prev_marker = $prev_marker;
        return $this;
    }

    /*** End Getters and Setters ***/

}