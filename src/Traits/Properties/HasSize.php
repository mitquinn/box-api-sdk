<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasSize
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasSize
{
    protected int $size;

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return HasSize
     */
    public function setSize(int $size): static
    {
        $this->size = $size;
        return $this;
    }

}