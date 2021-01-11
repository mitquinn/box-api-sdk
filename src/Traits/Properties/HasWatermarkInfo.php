<?php

namespace Mitquinn\BoxApiSdk\Traits\Properties;

/**
 * Trait HasWatermarkInfo
 * @package Mitquinn\BoxApiSdk\Traits\Properties
 */
trait HasWatermarkInfo
{
    /** @var array $watermark_info */
    protected array $watermark_info;

    /**
     * @return array
     */
    public function getWatermarkInfo(): array
    {
        return $this->watermark_info;
    }

    /**
     * @param array $watermark_info
     * @return HasWatermarkInfo
     */
    public function setWatermarkInfo(array $watermark_info): static
    {
        $this->watermark_info = $watermark_info;
        return $this;
    }

}