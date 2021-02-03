<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetFileInformationRequest
 * @package Mitquinn\BoxApiSdk\Requests\Files
 */
class GetFileInformationRequest extends BaseRequest
{
    use HasId;

    protected string $method = 'GET';

    /**
     * GetFileInformationRequest constructor.
     * @param int $id
     * @param array $query
     * @param array $body
     * @param array $header
     */
    public function __construct(int $id, array $query = [], array $header = [])
    {
        $this->setId(id: $id);
        parent::__construct(query: $query, header: $header);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment  = 'files/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}