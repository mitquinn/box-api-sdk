<?php

namespace Mitquinn\BoxApiSdk\Requests\Comments;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetCommentRequest
 * @package Mitquinn\BoxApiSdk\Requests\Comments
 */
class GetCommentRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetCommentRequest constructor.
     * @param string $id
     * @param array $query
     */
    public function __construct(string $id, array $query = [])
    {
        $this->setId($id);
        parent::__construct(query: $query);
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