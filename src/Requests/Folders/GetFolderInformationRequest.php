<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetFolderInformationRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class GetFolderInformationRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetFolderInformationRequest constructor.
     * @param string $id
     * @param array $query
     * @param array $header
     */
    public function __construct(string $id, array $query = [], array $header = [])
    {
        $this->setId(id: $id);
        parent::__construct(query: $query, header: $header);
    }


    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId();
        return $this->generateUri(requestSegment: $requestSegment);
    }
}