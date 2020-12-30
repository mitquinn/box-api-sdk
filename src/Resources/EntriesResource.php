<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Psr\Http\Message\ResponseInterface;

/**
 * Class EntriesResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
abstract class EntriesResource
{

    protected array $entries = [];

    protected int $limit;

    protected int $offset;

    protected array $order = [];

    protected int $total_count;

    public function __construct(ResponseInterface|array $response)
    {
        if (is_a($response, ResponseInterface::class)) {
            $response = json_decode($response->getBody()->getContents(), true);
        }
        $this->mapResource($response);
    }

    protected function mapResource(array $response): static
    {
        if (array_key_exists('limit', $response)) {
            $this->setLimit($response['limit']);
        }

        if (array_key_exists('offset', $response)) {
            $this->setLimit($response['offset']);
        }

        if (array_key_exists('order', $response)) {
            $this->setLimit($response['order']);
        }

        if (array_key_exists('total_count', $response)) {
            $this->setLimit($response['limit']);
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

    /*** End Getters and Setters ***/

}