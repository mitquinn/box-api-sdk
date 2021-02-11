<?php

namespace Mitquinn\BoxApiSdk\Requests\Comments;

use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetCommentRequest
 * @package Mitquinn\BoxApiSdk\Requests\Comments
 */
class GetCommentRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetCommentRequest constructor.
     * @param int $id
     * @param array $query
     */
    public function __construct(int $id, array $query = [])
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