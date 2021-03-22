<?php

namespace Mitquinn\BoxApiSdk\Resources\Files;

use Mitquinn\BoxApiSdk\Resources\Resource;

/**
 * Class FileResource
 * @package Mitquinn\BoxApiSdk\Resources
 * Todo: Convert to Resource
 */
class Files extends Resource
{

    /** @var File[] $entries */
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
                $files[] = new File(response: $file);
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
     * @return File[]
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param File[] $entries
     * @return Files
     */
    public function setEntries(array $entries): Files
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
     * @return Files
     */
    public function setTotalCount(int $total_count): Files
    {
        $this->total_count = $total_count;
        return $this;
    }

    /*** End Getters and Setters ***/

}