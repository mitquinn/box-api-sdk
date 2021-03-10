<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListFileCommentsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Comments
 */
class ListFileCommentsRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';


    /**
     * ListFileCommentsRequest constructor.
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
        $requestSegment = 'files/'.$this->getId().'/comments';
        return $this->generateUri($requestSegment);
    }
}