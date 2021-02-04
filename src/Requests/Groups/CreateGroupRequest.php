<?php

namespace Mitquinn\BoxApiSdk\Requests\Groups;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class CreateGroupRequest
 * @package Mitquinn\BoxApiSdk\Requests\Groups
 */
class CreateGroupRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CreateGroupRequest constructor.
     * @param array $body
     * @param array $query
     */
    public function __construct(array $body, array $query = [])
    {
        parent::__construct(query: $query, body: $body);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('groups');
    }
}