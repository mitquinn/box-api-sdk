<?php


namespace Mitquinn\BoxApiSdk\Resources\Collections;


use Mitquinn\BoxApiSdk\Resources\Resource;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasName;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class Collection
 * @package Mitquinn\BoxApiSdk\Resources\Collections
 */
class Collection extends Resource
{
    use HasId, HasType, HasName;

    /** @var string $collection_type */
    protected string $collection_type;

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {

        $collection = new \Illuminate\Support\Collection($response);

        $this->setProperties($collection);

        return $this;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getCollectionType(): string
    {
        return $this->collection_type;
    }

    /**
     * @param string $collection_type
     * @return Collection
     */
    public function setCollectionType(string $collection_type): Collection
    {
        $this->collection_type = $collection_type;
        return $this;
    }

    /*** End Getters and Setters ***/

}