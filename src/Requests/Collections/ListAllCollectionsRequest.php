<?php

namespace Mitquinn\BoxApiSdk\Requests\Collections;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class ListAllCollectionsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collections
 */
class ListAllCollectionsRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListAllCollectionsRequest constructor.
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
        return $this->generateUri('collections');
    }
}