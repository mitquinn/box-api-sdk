<?php

namespace Mitquinn\BoxApiSdk\Resources;


use Psr\Http\Message\ResponseInterface;

/**
 * Class FolderResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class FolderResource
{

    public function __construct(ResponseInterface|array $response)
    {
        if (is_a($response, ResponseInterface::class)) {
            $response = json_decode($response->getBody()->getContents(), true);
        }

        $this->mapResource($response);
    }

    protected function mapResource(array $response): FolderResource
    {



        return $this;
    }

}