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

    public function __construct(int $id, array $query = [], array $body = [], array $header = [])
    {
        parent::__construct($query, $body, $header);
        $this->setId($id);
    }

    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}