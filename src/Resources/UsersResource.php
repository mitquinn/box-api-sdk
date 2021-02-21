<?php


namespace Mitquinn\BoxApiSdk\Resources;

use Psr\Http\Message\ResponseInterface;

/**
 * Class UsersResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class UsersResource extends EntriesResource
{

    /**
     * @param array $response
     * @return UsersResource
     */
    protected function mapResource(array $response): static
    {
        parent::mapResource(response: $response);

        if (array_key_exists('entries', $response)) {
            $users = [];
            foreach ($response['entries'] as $entry) {
                $users[] = new User($entry);
            }
            $this->setEntries($users);
        }

        return $this;
    }

}