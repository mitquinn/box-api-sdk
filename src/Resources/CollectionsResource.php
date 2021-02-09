<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class CollectionsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class CollectionsResource extends EntriesResource
{
    /**
     * @param array $response
     * @return $this
     */
    protected function mapResource(array $response): static
    {
        parent::mapResource($response);

        if (array_key_exists('entries', $response)) {
            $collections = [];
            foreach ($response['entries'] as $entry) {
                $collections[] = new CollectionResource($entry);
            }
            $this->setEntries($collections);
        }

        return $this;
    }


    /**
     * @return CollectionResource[]
     */
    public function getEntries(): array
    {
        return parent::getEntries();
    }
}