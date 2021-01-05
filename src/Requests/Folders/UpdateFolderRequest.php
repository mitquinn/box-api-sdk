<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class UpdateFolderRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    use HasId;

    protected string $method = 'PUT';

    public function __construct(int $id, array $query = [], array $body = [], array $header = [])
    {
        parent::__construct($query, $body, $header);
        $this->setId(id: $id);
    }

    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}