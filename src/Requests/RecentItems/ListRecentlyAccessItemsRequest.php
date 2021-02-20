<?php

namespace Mitquinn\BoxApiSdk\Requests\RecentItems;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class ListRecentlyAccessItemsRequest
 * @package Mitquinn\BoxApiSdk\Requests\RecentItems
 */
class ListRecentlyAccessItemsRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListRecentlyAccessItemsRequest constructor.
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
        return $this->generateUri('recent_items');
    }
}