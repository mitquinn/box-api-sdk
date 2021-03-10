<?php

namespace Mitquinn\BoxApiSdk\Requests\EmailAliases;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListUsersEmailAliasesRequest
 * @package Mitquinn\BoxApiSdk\Requests\EmailAliases
 */
class ListUsersEmailAliasesRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListUsersEmailAliasesRequest constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->setId($id);
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'users/'.$this->getId().'/email_aliases';
        return $this->generateUri($requestSegment);
    }
}