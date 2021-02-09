<?php

namespace Mitquinn\BoxApiSdk\Requests\Collections;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListCollectionItemsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collections
 */
class ListCollectionItemsRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListCollectionItemsRequest constructor.
     * @param int $id
     * @param array $query
     */
    public function __construct(int $id, array $query = [])
    {
        $this->setId($id);
        parent::__construct(query: $query);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'collections/'.$this->getId().'/items';
        return $this->generateUri($requestSegment);
    }
}