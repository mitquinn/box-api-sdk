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

    /** @var array $headers */
    protected array $headers = [];

    /** @var array $query */
    protected array $query;

    /** @var string[] VALID_METHODS */
    CONST VALID_METHODS = ['GET', 'POST', 'PUT', 'DELETE'];

    public function __construct(array $query = [])
    {
        $this->setQuery($query);
    }

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
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return BaseRequestInterface
     */
    public function setHeaders(array $headers): BaseRequestInterface
    {
        $this->headers = $headers;
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

    /*** End Getters and Setters ***/

}