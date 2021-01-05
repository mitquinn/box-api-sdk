<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class CopyFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class CopyFolderRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    use HasId;

    protected string $method = 'POST';

    /**
     * CopyFolderRequest constructor.
     * @param int $id
     * @param array $body
     * @param array $query
     * @param array $header
     */
    public function __construct(int $id, array $body, array $query = [], array $header = [])
    {
        parent::__construct(query: $query, body: $body, header: $header);
        $this->setId(id: $id);
    }

    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId().'/copy';
        return $this->generateUri(requestSegment: $requestSegment);
    }
}