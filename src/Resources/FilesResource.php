<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class FileResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class FilesResource extends BaseResource
{

    /** @var FileResource[] $entries */
    protected array $entries;

    /** @var int $total_count */
    protected int $total_count;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        //Todo: Switch to instantiating FileResource class
        if (array_key_exists('entries', $response)) {
            $files = [];
            foreach ($response['entries'] as $file) {
                $files[] = new FileResource(response: $file);
            }
            $this->setEntries($files);
        }

        if (array_key_exists('total_count', $response)) {
            $this->setTotalCount($response['total_count']);
        }

        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return FileResource[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param FileResource[] $entries
     * @return FilesResource
     */
    public function setEntries(array $entries): FilesResource
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
     * @return FilesResource
     */
    public function setTotalCount(int $total_count): FilesResource
    {
        $this->total_count = $total_count;
        return $this;
    }

    /*** End Getters and Setters ***/

}