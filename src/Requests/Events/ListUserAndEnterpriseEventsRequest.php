<?php

namespace Mitquinn\BoxApiSdk\Requests\Events;

/**
 * Class ListUserAndEnterpriseEventsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Events
 */
class ListUserAndEnterpriseEventsRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListUserAndEnterpriseEventsRequest constructor.
     * @param array $query
     */
    public function __construct(array $query = [])
    {
        parent::__construct(query: $query);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('events');
    }
}