<?php

namespace Mitquinn\BoxApiSdk\Exceptions;

/**
 * Class BoxNotFoundException
 * @package Mitquinn\BoxApiSdk\Exceptions
 */
class BoxNotFoundException extends BaseException
{

    protected $code = 404;

    protected $message = 'The requested resource was not found.';

}