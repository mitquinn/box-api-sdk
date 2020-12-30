<?php

namespace Mitquinn\BoxApiSdk\Exceptions;

use Exception;

/**
 * Class InvalidRequestException
 * @package Mitquinn\BoxApiSdk\Exceptions
 */
class BoxBadRequestException extends BaseException
{

    protected $code = 400;

    protected $message = 'The provided request is invalid.';

}