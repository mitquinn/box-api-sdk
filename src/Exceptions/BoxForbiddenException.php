<?php

namespace Mitquinn\BoxApiSdk\Exceptions;

/**
 * Class BoxForbiddenException
 * @package Mitquinn\BoxApiSdk\Exceptions
 */
class BoxForbiddenException extends BaseException
{
    protected $code = 403;

    protected $message = 'Insufficient permissions to access requested resource.';
}