<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Traits\CanValidateHttpResponse;
use Psr\Http\Client\ClientInterface;

/**
 * Class BaseCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
abstract class BaseCollection
{
    use CanValidateHttpResponse;

    protected ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->setClient($client);
    }

    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     * @return BaseCollection
     */
    public function setClient(ClientInterface $client): BaseCollection
    {
        $this->client = $client;
        return $this;
    }

}