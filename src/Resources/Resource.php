<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Mitquinn\BoxApiSdk\Traits\HasResourcePropertyChecks;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
abstract class Resource
{
    use HasResourcePropertyChecks;

    /** @var array $response */
    protected array $response;

    /** @var array $headers */
    protected array $headers;

    /**
     * BaseResource constructor.
     * @param ResponseInterface|array $response
     */
    public function __construct(ResponseInterface|array $response)
    {
        if (is_a($response, ResponseInterface::class)) {
            $this->setHeaders($response->getHeaders());
            $response = json_decode($response->getBody()->getContents(), true);
        }

        $this->setResponse(response: $response);
        $this->mapResource(response: $response);
    }

    /**
     * @param array $response
     * @return $this
     */
    abstract protected function mapResource(array $response): static;

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }

    /**
     * @param array $response
     * @return Resource
     */
    public function setResponse(array $response): Resource
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return Resource
     */
    public function setHeaders(array $headers): Resource
    {
        $this->headers = $headers;
        return $this;
    }

}