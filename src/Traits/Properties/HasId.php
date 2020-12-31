<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasIdProperty
 * @package Mitquinn\BoxApiSdk\Traits
 */
trait HasId
{

    protected int $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return static
     */
    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

}