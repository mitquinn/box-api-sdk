<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Psr\Http\Message\ResponseInterface;

/**
 * Class EntriesResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
abstract class EntriesResource
{
    /** @var array $response */
    protected array $response;

    /** @var array $entries */
    protected array $entries = [];

    /** @var int $limit */
    protected int $limit;

    /** @var int $offset */
    protected int $offset;

    /** @var array $order */
    protected array $order = [];

    /** @var int $total_count */
    protected int $total_count;

    /**
     * EntriesResource constructor.
     * @param ResponseInterface|array $response
     */
    public function __construct(ResponseInterface|array $response)
    {
        if (is_a($response, ResponseInterface::class)) {
            $response = json_decode($response->getBody()->getContents(), true);
        }
        $this->mapResource($response);
        $this->setResponse($response);
    }

    /**
     * @param array $response
     * @return $this
     */
    protected function mapResource(array $response): static
    {
        if (array_key_exists('limit', $response)) {
            $this->setLimit($response['limit']);
        }

        if (array_key_exists('offset', $response)) {
            $this->setOffset($response['offset']);
        }

        if (array_key_exists('order', $response)) {
            $this->setOrder($response['order']);
        }

        if (array_key_exists('total_count', $response)) {
            $this->setTotalCount($response['total_count']);
        }

        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return array
     */
    public function getEntries(): array
    {
        return $this->entries;
    }

    /**
     * @param array $entries
     * @return EntriesResource
     */
    public function setEntries(array $entries): EntriesResource
    {
        $this->entries = $entries;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return EntriesResource
     */
    public function setLimit(int $limit): EntriesResource
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return EntriesResource
     */
    public function setOffset(int $offset): EntriesResource
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrder(): array
    {
        return $this->order;
    }

    /**
     * @param array $order
     * @return EntriesResource
     */
    public function setOrder(array $order): EntriesResource
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return $this->total_count;
    }

    /**
     * @param int $total_count
     * @return EntriesResource
     */
    public function setTotalCount(int $total_count): EntriesResource
    {
        $this->total_count = $total_count;
        return $this;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @param array $response
     * @return EntriesResource
     */
    public function setResponse(array $response): EntriesResource
    {
        $this->response = $response;
        return $this;
    }

    /*** End Getters and Setters ***/

}