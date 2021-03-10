<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class DeleteFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class DeleteFolderRequest extends BaseRequest
{
    use HasId;

    protected string $method = 'DELETE';

    /**
     * DeleteFolderRequest constructor.
     * @param string $id
     * @param array $query
     * @param array $header
     */
    public function __construct(string $id, array $query = [], array $header = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, header: $header);
    }

    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}