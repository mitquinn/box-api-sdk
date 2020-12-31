<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasType
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasType
{
    protected string $type;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return HasType
     */
    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

}