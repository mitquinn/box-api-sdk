<?php

namespace Mitquinn\BoxApiSdk\Requests;

/**
 * Class GenericRequest
 * @package Mitquinn\BoxApiSdk\Requests
 * @info This is a generic request class that can be used to build request from scratch without validation.
 */
class GenericRequest extends BaseRequest
{
    /** @var string $requestSegment */
    protected string $requestSegment;

    public function __construct(string $method, string $requestSegment, array $query = [], array $body = [], array $header = [])
    {
        $this->setMethod($method);
        $this->setRequestSegment($requestSegment);
        parent::__construct(query: $query, body: $body, header: $header);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri($this->getRequestSegment());
    }

    /**
     * @inheritDoc
     */
    public function validateQuery(array $query): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function validateBody(array $body): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function validateHeader(array $header): bool
    {
        return true;
    }

    /**
     * @return string
     */
    public function getRequestSegment(): string
    {
        return $this->requestSegment;
    }

    /**
     * @param string $requestSegment
     * @return GenericRequest
     */
    public function setRequestSegment(string $requestSegment): GenericRequest
    {
        $this->requestSegment = $requestSegment;
        return $this;
    }

}