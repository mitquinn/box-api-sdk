<?php

namespace Mitquinn\BoxApiSdk\Requests\EmailAliases;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class CreateEmailAliasRequest
 * @package Mitquinn\BoxApiSdk\Requests\EmailAliases
 */
class CreateEmailAliasRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CreateEmailAliasRequest constructor.
     * @param int $id
     * @param array $body
     */
    public function __construct(int $id, array $body)
    {
        $this->setId($id);
        parent::__construct(body: $body);
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