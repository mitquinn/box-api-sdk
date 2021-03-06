<?php

namespace Mitquinn\BoxApiSdk\Traits;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait CanValidateHttpResponse
 * @package Mitquinn\BoxApiSdk\Traits
 */
trait CanValidateHttpResponse
{

    /**
     * TODO: Add in the other Box Http Error Exceptions
     * TODO: Should this just be a static helper in a helper class?
     * TODO: Should the return type here be void?
     * @see https://developer.box.com/guides/api-calls/permissions-and-errors/common-errors/
     * @param ResponseInterface $response
     * @return bool
     * @throws BoxAuthorizationException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws BoxConflictException
     * @throws BoxBadRequestException
     */
    public function validateResponse(ResponseInterface $response): bool
    {
        if ($response->getStatusCode() === 200
            or $response->getStatusCode() === 201
            or $response->getStatusCode() === 204
            or $response->getStatusCode() === 302
        ) {
            return true;
        }

        var_dump($response->getBody()->getContents());

        if ($response->getStatusCode() === 400) {
            throw new BoxBadRequestException(response: $response);
        }

        if ($response->getStatusCode() === 401) {
            throw new BoxAuthorizationException(response: $response);
        }

        if ($response->getStatusCode() === 403) {
            throw new BoxForbiddenException(response: $response);
        }

        if ($response->getStatusCode() === 404) {
            throw new BoxNotFoundException(response: $response);
        }

        if ($response->getStatusCode() === 409) {
            throw new BoxConflictException(response: $response);
        }
    }

}