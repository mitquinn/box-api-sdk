<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class GroupMembershipsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class GroupMembershipsResource extends EntriesResource
{
    /**
     * @param array $response
     * @return GroupMembershipsResource
     */
    protected function mapResource(array $response): static
    {
        parent::mapResource(response: $response);

        if (array_key_exists('entries', $response)) {
            $groups = [];
            foreach ($response['entries'] as $entry) {
                $groups[] = new GroupMembershipResource($entry);
            }
            $this->setEntries($groups);
        }

        return $this;
    }
}