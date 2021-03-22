<?php

namespace Mitquinn\BoxApiSdk\Resources\EmailAliases;

use Mitquinn\BoxApiSdk\Resources\EntriesResource;


/**
 * Class EmailAliasesResource
 * @package Mitquinn\BoxApiSdk\Resources
 * Todo: This class doesnt seem to have a limit or other properties. Perhaps need to create subentry?
 * Todo: Convert to resource
 */
class EmailAliasesResource extends EntriesResource
{

    /**
     * @param array $response
     * @return $this
     */
    protected function mapResource(array $response): static
    {
        parent::mapResource($response);

        if (array_key_exists('entries', $response)) {
            $emailAliases = [];
            foreach ($response['entries'] as $emailAlias) {
                $emailAliases[] = new EmailAlias($emailAlias);
            }
            $this->setEntries($emailAliases);
        }

        return $this;
    }

    /**
     * @return EmailAlias[]
     */
    public function getEntries(): array
    {
        return parent::getEntries();
    }
}