<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasSharedLink
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasSharedLink
{
    /** @var array|null $shared_link */
    protected array|null $shared_link;

    /**
     * @return array|null
     */
    public function getSharedLink(): ?array
    {
        return $this->shared_link;
    }

    /**
     * @param array|null $shared_link
     * @return HasSharedLink
     */
    public function setSharedLink(?array $shared_link): static
    {
        $this->shared_link = $shared_link;
        return $this;
    }

}