<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

use Mitquinn\BoxApiSdk\Resources\FolderResource;

/**
 * Trait HasParent
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasParent
{
    /** @var FolderResource|null $parent */
    protected FolderResource|null $parent;

    /**
     * @return FolderResource|null
     */
    public function getParent(): ?FolderResource
    {
        return $this->parent;
    }

    /**
     * @param FolderResource|null $parent
     * @return HasParent
     */
    public function setParent(?FolderResource $parent): static
    {
        $this->parent = $parent;
        return $this;
    }

}