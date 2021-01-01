<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListItemsInFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class ListItemsInFolderRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    use HasId;

    protected string $method = 'GET';

    /**
     * ListItemsInFolderRequest constructor.
     * @param int $id
     * @param array $query
     * @param array $body
     * @param array $header
     */
    public function __construct(int $id, array $query = [], array $body = [], array $header = [])
    {
        parent::__construct(query: $query, body: $body, header: $header);
        $this->setId(id: $id);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId().'/items';
        return $this->generateUri(requestSegment: $requestSegment);
    }
}