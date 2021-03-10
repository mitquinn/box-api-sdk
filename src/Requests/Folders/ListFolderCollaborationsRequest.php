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
     * @param string $id
     * @param array $query
     */
    public function __construct(string $id, array $query = [], )
    {
        $this->setId($id);
        parent::__construct(query: $query);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId().'/collaborations';
        return $this->generateUri($requestSegment);
    }
}