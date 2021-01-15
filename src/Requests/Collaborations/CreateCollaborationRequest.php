<?php

namespace Mitquinn\BoxApiSdk\Requests\Collaborations;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class CreateCollaborationRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collaborations
 */
class CreateCollaborationRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'POST';

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->generateUri('collaborations');
    }
}