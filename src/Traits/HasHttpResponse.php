<?php

namespace Mitquinn\BoxApiSdk\Traits;

use Psr\Http\Message\ResponseInterface;

trait HasHttpResponse
{
    protected ResponseInterface $response;

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    /**
     * @param ResponseInterface $response
     * @return HasHttpResponse
     */
    public function setResponse(ResponseInterface $response): static
    {
        $this->response = $response;
        return $this;
    }


}