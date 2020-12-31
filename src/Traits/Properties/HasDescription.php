<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasDescription
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasDescription
{
    /** @var string $description */
    protected string $description;

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return HasDescription
     */
    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

}