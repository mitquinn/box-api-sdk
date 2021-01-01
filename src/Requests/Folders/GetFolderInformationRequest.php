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

    public function __construct(int $id, array $query = [], array $body = [], array $header = [])
    {
        parent::__construct(query: $query, body: $body, header: $header);
        $this->setId(id: $id);
    }


    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId();
        return $this->generateUri(requestSegment: $requestSegment);
    }
}