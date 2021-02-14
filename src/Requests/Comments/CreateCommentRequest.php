<?php

namespace Mitquinn\BoxApiSdk\Requests\Comments;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class CreateCommentRequest
 * @package Mitquinn\BoxApiSdk\Requests\Comments
 */
class CreateCommentRequest extends BaseRequest
{

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CreateCommentRequest constructor.
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
        return $this->generateUri('comments');
    }
}