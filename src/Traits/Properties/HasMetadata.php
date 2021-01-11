<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasMetadata
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasMetadata
{
    protected array $metadata;

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     * @return HasMetadata
     */
    public function setMetadata(array $metadata): static
    {
        $this->metadata = $metadata;
        return $this;
    }

}