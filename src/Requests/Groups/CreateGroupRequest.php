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
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('groups');
    }
}