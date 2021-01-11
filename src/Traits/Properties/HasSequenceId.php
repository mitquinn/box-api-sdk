<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasSequenceId
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasSequenceId
{
    /** @var string|null $sequence_id */
    protected string|null $sequence_id;

    /**
     * @return string|null
     */
    public function getSequenceId(): ?string
    {
        return $this->sequence_id;
    }

    /**
     * @param string|null $sequence_id
     * @return HasSequenceId
     */
    public function setSequenceId(?string $sequence_id): static
    {
        $this->sequence_id = $sequence_id;
        return $this;
    }

}