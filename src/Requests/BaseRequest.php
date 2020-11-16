<?php

namespace Mitquinn\BoxApiSdk\Requests;

use Mitquinn\BoxApiSdk\Exceptions\InvalidRequestException;
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

    protected array $headers = [

    ];

    CONST VALID_METHODS = ['GET', 'POST', 'PUT', 'DELETE'];

    abstract public function getUri(): string;

    abstract public function generateRequestInterface(): RequestInterface;


    /*** Start Getters and Setters ***/

    /**
     * @return string
     * @throws InvalidRequestException
     */
    public function getMethod(): string
    {

        if (!in_array($this->method, BaseRequest::VALID_METHODS)) {
            throw new InvalidRequestException('The request method is invalid. The request method must be set.');
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
     * @return BaseRequest
     */
    public function setHeaders(array $headers): BaseRequest
    {
        $this->headers = $headers;
        return $this;
    }

    /*** End Getters and Setters ***/

}