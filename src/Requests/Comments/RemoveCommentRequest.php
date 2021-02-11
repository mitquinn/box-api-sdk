<?php

namespace Mitquinn\BoxApiSdk\Requests\Comments;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class RemoveCommentRequest
 * @package Mitquinn\BoxApiSdk\Requests\Comments
 */
class RemoveCommentRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * RemoveCommentRequest constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->setId($id);
        parent::__construct();
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