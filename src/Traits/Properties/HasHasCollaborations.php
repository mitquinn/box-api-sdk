<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasCollaborations
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasHasCollaborations
{
    /** @var bool $has_collaborations */
    protected bool $has_collaborations;

    /**
     * @return bool
     */
    public function isHasCollaborations(): bool
    {
        return $this->has_collaborations;
    }

    /**
     * @param bool $has_collaborations
     * @return HasHasCollaborations
     */
    public function setHasCollaborations(bool $has_collaborations): static
    {
        $this->has_collaborations = $has_collaborations;
        return $this;
    }

}