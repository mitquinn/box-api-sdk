<?php

namespace Mitquinn\BoxApiSdk\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Mitquinn\BoxApiSdk\Traits\HasHttpResponse;
use Throwable;

/**
 * Class BoxAuthorizationException
 * @package Mitquinn\BoxApiSdk\Exceptions
 */
class BoxAuthorizationException extends BaseException
{
    protected $code = 401;

    protected $message = 'Failed to authorize.';

}