<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasPathCollection
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasPathCollection
{
    /** @var array $path_collection */
    protected array $path_collection;

    /**
     * @return array
     */
    public function getPathCollection(): array
    {
        return $this->path_collection;
    }

    /**
     * @param array $path_collection
     * @return HasPathCollection
     */
    public function setPathCollection(array $path_collection): static
    {
        $this->path_collection = $path_collection;
        return $this;
    }

}