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
     * ListPendingCollaborationsRequest constructor.
     * @param array $query
     */
    public function __construct(array $query)
    {
        parent::__construct(query: $query);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('collaborations');
    }
}