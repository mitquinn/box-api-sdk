<?php

namespace Mitquinn\BoxApiSdk\Exceptions;

use Exception;

/**
 * Class InvalidRequestException
 * @package Mitquinn\BoxApiSdk\Exceptions
 */
class InvalidRequestException extends Exception
{

    protected $message = 'The provide request is invalid.';

    protected $code = 500;

}