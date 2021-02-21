<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

use Mitquinn\BoxApiSdk\Resources\Folder;

/**
 * Trait HasParent
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasParent
{
    /** @var Folder|null $parent */
    protected Folder|null $parent;

    /**
     * @return Folder|null
     */
    public function getParent(): ?Folder
    {
        return $this->parent;
    }

    /**
     * @param Folder|null $parent
     * @return HasParent
     */
    public function setParent(?Folder $parent): static
    {
        $this->parent = $parent;
        return $this;
    }

}