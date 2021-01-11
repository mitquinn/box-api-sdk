<?php


namespace Mitquinn\BoxApiSdk\Exceptions;


class BoxConflictException extends BaseException
{
    protected $code = 409;

    protected $message = 'There was a conflict when creating this resource.';

}