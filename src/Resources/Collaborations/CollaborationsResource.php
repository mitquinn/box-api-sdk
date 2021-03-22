<?php

namespace Mitquinn\BoxApiSdk\Resources\Collaborations;

use Mitquinn\BoxApiSdk\Resources\EntriesResource;

/**
 * Class CollaborationsResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class CollaborationsResource extends EntriesResource
{

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        parent::mapResource(response: $response);

        if (array_key_exists('entries', $response)) {
            $collaborations = [];
            foreach ($response['entries'] as $entry) {
                $collaborations[] = new Collaboration($entry);
            }
            $this->setEntries($collaborations);
        }

        return $this;
    }
}