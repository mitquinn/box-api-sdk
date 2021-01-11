<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasTags
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasTags
{
    /** @var array $tags */
    protected array $tags;

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return HasTags
     */
    public function setTags(array $tags): static
    {
        $this->tags = $tags;
        return $this;
    }

}