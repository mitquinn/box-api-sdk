<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasClassification
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasClassification
{
    /** @var array|null $classification */
    protected array|null $classification;

    /**
     * @return array|null
     */
    public function getClassification(): ?array
    {
        return $this->classification;
    }

    /**
     * @param array|null $classification
     * @return HasClassification
     */
    public function setClassification(?array $classification): static
    {
        $this->classification = $classification;
        return $this;
    }

}