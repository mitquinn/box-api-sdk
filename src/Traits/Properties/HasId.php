<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasIdProperty
 * @package Mitquinn\BoxApiSdk\Traits
 */
trait HasId
{
    /** @var string  */
    protected string $id;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): static
    {
        $this->id = $id;
        return $this;
    }

}