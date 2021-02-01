<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class ListItemsInFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class ListItemsInFolderRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListItemsInFolderRequest constructor.
     * @param int $id
     * @param array $query
     * @param array $header
     */
    public function __construct(int $id, array $query = [], array $header = [])
    {
        $this->setId(id: $id);
        parent::__construct(query: $query, header: $header);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId().'/items';
        return $this->generateUri(requestSegment: $requestSegment);
    }

    /**
     * @inheritDoc
     */
    public function validateQuery(array $query): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function validateBody(array $body): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function validateHeader(array $header): bool
    {
        return true;
    }
}