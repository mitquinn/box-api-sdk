<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class ItemsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class ItemsResource extends EntriesResource
{

    /**
     * @param array $response
     * @return ItemsResource
     */
    protected function mapResource(array $response): static
    {
        parent::mapResource(response: $response);

        if (array_key_exists('entries', $response)) {
            $items = [];
            foreach ($response['entries'] as $entry) {
                if (array_key_exists('type', $entry)) {

                    if ($entry['type'] === 'folder') {
                        $items[] = new FolderResource($entry);
                    }

                    //Todo: Need to add File and Weblink here as well.

                }
            }
            $this->setEntries($items);
        }

        return $this;
    }

}