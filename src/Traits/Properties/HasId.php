<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasIdProperty
 * @package Mitquinn\BoxApiSdk\Traits
 */
trait HasId
{
    /** @var int|null  */
    protected int|null $id;

    /**
     * @return int|null
     */
    public function getId(): int|null
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return static
     */
    public function setId(int|null $id): static
    {
        $this->id = $id;
        return $this;
    }

}