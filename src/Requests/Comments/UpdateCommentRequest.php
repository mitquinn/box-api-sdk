<?php

namespace Mitquinn\BoxApiSdk\Requests\Comments;

use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateCommentRequest
 * @package Mitquinn\BoxApiSdk\Requests\Comments
 */
class UpdateCommentRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateCommentRequest constructor.
     * @param string $id
     * @param array $query
     * @param array $body
     */
    public function __construct(string $id, array $query = [], array $body = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body: $body);
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'comments/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}