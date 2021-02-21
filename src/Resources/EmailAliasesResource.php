<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class EmailAliasesResource
 * @package Mitquinn\BoxApiSdk\Resources
 * Todo: This class doesnt seem to have a limit or other properties. Perhaps need to create subentry?
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