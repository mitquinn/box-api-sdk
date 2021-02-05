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
     * CreateCollaborationRequest constructor.
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
        return $this->generateUri('collaborations');
    }
}