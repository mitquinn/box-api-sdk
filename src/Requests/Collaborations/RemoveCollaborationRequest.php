<?php

namespace Mitquinn\BoxApiSdk\Requests\Collaborations;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class RemoveCollaborationRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collaborations
 */
class RemoveCollaborationRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * RemoveCollaborationRequest constructor.
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
        $requestSegment = 'collaborations/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}