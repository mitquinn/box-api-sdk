<?php

namespace Mitquinn\BoxApiSdk\Requests\Users;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateUserRequest
 * @package Mitquinn\BoxApiSdk\Requests\Users
 */
class UpdateUserRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateUserRequest constructor.
     * @param int $id
     * @param array $body
     * @param array $query
     */
    public function __construct(int $id, array $body, array $query = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body: $body);
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