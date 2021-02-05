<?php

namespace Mitquinn\BoxApiSdk\Requests\Collaborations;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetCollaborationRequest
 * @package Mitquinn\BoxApiSdk\Requests\Collaborations
 */
class GetCollaborationRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetCollaborationRequest constructor.
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
        $requestSegment =  'collaborations/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}