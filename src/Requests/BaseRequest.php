<?php

namespace Mitquinn\BoxApiSdk\Requests;

use GuzzleHttp\Psr7\Request;
use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Interfaces\BaseRequestInterface;
use Psr\Http\Message\RequestInterface;


/**
 * Class BaseRequest
 * @package Mitquinn\BoxApiSdk\Requests
 */
abstract class BaseRequest implements BaseRequestInterface
{
    /** @var string $baseUri **/
    protected string $baseUri = 'https://api.box.com/';

    /** @var string $version **/
    protected string $version = '2.0/';

    /** @var string $method **/
    protected string $method;

    /** @var array $header */
    protected array $header = [];

    /** @var array $query */
    protected array $query;

    /** @var array $body */
    protected array $body = [];


    /** @var string[] VALID_METHODS */
    CONST VALID_METHODS = ['GET', 'POST', 'PUT', 'DELETE'];

    /**
     * BaseRequest constructor.
     * @param array $query
     * @param array $body
     * @param array $header
     */
    public function __construct(array $query = [], array $body = [], array $header = [])
    {
        $this->setHeader(header: $header);
        $this->setQuery(query: $query);
        $this->setBody(body: $body);
    }

    /**
     * @return string
     */
    abstract public function getUri(): string;


    /**
     * @return RequestInterface
     * @throws BoxBadRequestException
     */
    public function generateRequestInterface(): RequestInterface
    {
        return new Request(
            $this->getMethod(),
            $this->getUri(),
            $this->getHeader(),
            json_encode($this->getBody())
        );
    }

    /**
     * @param string $requestSegment
     * @return string
     */
    protected function generateUri(string $requestSegment): string
    {
        $query = '';
        if (!empty($this->getQuery())) {
            $query = '?'.http_build_query($this->getQuery());
        }

        return $this->getBaseUri().$this->getVersion().$requestSegment.$query;
    }

    /*** Start Getters and Setters ***/

    /**
     * @return string
     * @throws BoxBadRequestException
     */
    public function getMethod(): string
    {
        if (!in_array($this->method, BaseRequest::VALID_METHODS)) {
            throw new BoxBadRequestException('The request method is invalid. The request method must be set.');
        }

        return $this->method;
    }


    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     * @return BaseRequest
     */
    public function setBaseUri(string $baseUri): BaseRequestInterface
    {
        $this->baseUri = $baseUri;
        return $this;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return BaseRequest
     */
    public function setVersion(string $version): BaseRequest
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeader(): array
    {
        return $this->header;
    }

    /**
     * @param array $header
     * @return BaseRequestInterface
     */
    public function setHeader(array $header): BaseRequestInterface
    {
        $this->header = $header;
        return $this;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @param array $query
     * @return BaseRequestInterface
     */
    public function setQuery(array $query): BaseRequestInterface
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @param array $body
     * @return BaseRequest
     */
    public function setBody(array $body): BaseRequest
    {
        $this->body = $body;
        return $this;
    }

    /*** End Getters and Setters ***/

}