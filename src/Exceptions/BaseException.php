<?php

namespace Mitquinn\BoxApiSdk\Exceptions;

use Exception;
use Mitquinn\BoxApiSdk\Traits\HasHttpResponse;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * Class BaseException
 * @package Mitquinn\BoxApiSdk\Exceptions
 */
abstract class BaseException extends Exception
{
    use HasHttpResponse;

    /**
     * BoxAuthorizationException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     * @param ResponseInterface|null $response
     */
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null, ResponseInterface $response = null)
    {
        parent::__construct($message, $code, $previous);
        if (!is_null($response)) {
            $this->setResponse($response);
        }
    }

}