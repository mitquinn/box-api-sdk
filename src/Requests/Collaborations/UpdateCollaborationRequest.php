<?php

namespace Mitquinn\BoxApiSdk\Requests\Collaborations;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateCollaborationRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collaborations
 */
class UpdateCollaborationRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateCollaborationRequest constructor.
     * @param string $id
     * @param array $body
     */
    public function __construct(string $id, array $body)
    {
        $this->setId($id);
        parent::__construct(body: $body);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'collaborations/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}