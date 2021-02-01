<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class CopyFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class CopyFolderRequest extends BaseRequest
{
    use HasId;

    protected string $method = 'POST';

    /**
     * CopyFolderRequest constructor.
     * @param int $id
     * @param array $body
     * @param array $query
     */
    public function __construct(int $id, array $body, array $query = [])
    {
        $this->setId(id: $id);
        parent::__construct(query: $query, body: $body);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'folders/'.$this->getId().'/copy';
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