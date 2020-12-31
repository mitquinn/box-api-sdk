<?php

namespace Mitquinn\BoxApiSdk\Requests\Users;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\HasIdProperty;

/**
 * Class UpdateUserRequest
 * @package Mitquinn\BoxApiSdk\Requests\Users
 */
class UpdateUserRequest extends BaseRequest
{
    use HasIdProperty;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateUserRequest constructor.
     * Todo: I need to validate the body?
     * @param int $id
     * @param array $body
     * @param array $query
     */
    public function __construct(int $id, array $body, array $query = [])
    {
        parent::__construct(query: $query, body: $body);
        $this->setId($id);

    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'users/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}