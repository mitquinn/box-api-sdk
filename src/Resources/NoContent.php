<?php

namespace Mitquinn\BoxApiSdk\Resources;

/**
 * Class NoContentResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class NoContent extends Resource
{

    /**
     * @inheritDoc
     * @info We expect the $response here to be null.
     */
    protected function mapResource(array|null $response): static
    {
        return $this;
    }

    /**
     * @param array|null $response
     * @return Resource
     */
    public function setResponse(array|null $response): Resource
    {
        if (is_null($response)) {
            $response = [];
        }

        return parent::setResponse($response);
    }
}