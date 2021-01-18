<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListFolderCollaborationsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class ListFolderCollaborationsRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListFolderCollaborationsRequest constructor.
     * @param int $id
     * @param array $query
     * @param array $body
     * @param array $header
     */
    public function __construct(int $id, array $query = [], array $body = [], array $header = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, body: $body, header: $header);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId().'/collaborations';
        return $this->generateUri($requestSegment);
    }
}