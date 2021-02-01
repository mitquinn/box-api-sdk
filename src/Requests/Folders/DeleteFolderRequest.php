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

    public function __construct(int $id, array $query = [], array $header = [])
    {
        $this->setId($id);
        parent::__construct(query: $query, header: $header);
    }

    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId();
        return $this->generateUri($requestSegment);
    }

    public function validateQuery(array $query): bool
    {
        return true;
    }

    public function validateBody(array $body): bool
    {
        return true;
    }

    public function validateHeader(array $header): bool
    {
        return true;
    }
}