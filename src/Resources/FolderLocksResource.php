<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Illuminate\Support\Collection;

/**
 * Class FolderLocksResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class FolderLocksResource extends BaseResource
{

    /** @var FolderLockResource[] $entries */
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
                $folderLocks[] = new FolderLockResource($entry);
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
     * @return FolderLockResource[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param FolderLockResource[] $entries
     * @return FolderLocksResource
     */
    public function setEntries(array $entries): FolderLocksResource
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
     * @return FolderLocksResource
     */
    public function setLimit(int $limit): FolderLocksResource
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
     * @return FolderLocksResource
     */
    public function setNextMarker(?int $next_marker): FolderLocksResource
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
     * @return FolderLocksResource
     */
    public function setPrevMarker(?int $prev_marker): FolderLocksResource
    {
        $this->prev_marker = $prev_marker;
        return $this;
    }

    /*** End Getters and Setters ***/

}