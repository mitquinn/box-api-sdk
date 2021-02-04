<?php

namespace Mitquinn\BoxApiSdk\Requests\Groups;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class ListGroupsForEnterpriseRequest
 * @package Mitquinn\BoxApiSdk\Requests\Groups
 */
class ListGroupsForEnterpriseRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = "GET";

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('groups');
    }
}