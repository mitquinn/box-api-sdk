<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasItemStatus
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasItemStatus
{
    protected string $item_status;

    /**
     * @return string
     */
    public function getItemStatus(): string
    {
        return $this->item_status;
    }

    /**
     * @param string $item_status
     * @return HasItemStatus
     */
    public function setItemStatus(string $item_status): static
    {
        $this->item_status = $item_status;
        return $this;
    }

}