<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class GroupsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class GroupsResource extends EntriesResource
{

    /**
     * @param array $response
     * @return GroupsResource
     */
    protected function mapResource(array $response): static
    {
        parent::mapResource(response: $response);

        if (array_key_exists('entries', $response)) {
            $groups = [];
            foreach ($response['entries'] as $entry) {
                $groups[] = new Group($entry);
            }
            $this->setEntries($groups);
        }

        return $this;
    }

}