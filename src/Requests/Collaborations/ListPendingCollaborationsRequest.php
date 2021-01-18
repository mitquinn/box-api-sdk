<?php

namespace Mitquinn\BoxApiSdk\Requests\Collaborations;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class ListPendingCollaborationsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collaborations
 */
class ListPendingCollaborationsRequest extends BaseRequest
{
    protected string $method = 'GET';

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('collaborations');
    }
}