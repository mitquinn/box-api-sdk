<?php


namespace Mitquinn\BoxApiSdk\Interfaces;

use Psr\Http\Message\RequestInterface;

/**
 * Interface BaseRequestInterface
 * @package Mitquinn\BoxApiSdk\Interfaces
 */
interface BaseRequestInterface
{
    public function getBaseUri(): string;

    public function setBaseUri(string $uri): BaseRequestInterface;

    public function getUri(): string;

    public function getVersion(): string;

    public function setVersion(string $version): BaseRequestInterface;

    public function generateRequestInterface(): RequestInterface;

}