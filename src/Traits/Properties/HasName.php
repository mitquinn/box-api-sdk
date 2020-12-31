<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasName
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasName
{
    protected string $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return HasName
     */
    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }


}