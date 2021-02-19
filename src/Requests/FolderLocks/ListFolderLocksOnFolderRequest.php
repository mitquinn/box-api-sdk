<?php

namespace Mitquinn\BoxApiSdk\Requests\FolderLocks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class ListFolderLocksOnFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\FolderLocks
 */
class ListFolderLocksOnFolderRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'GET';

    /**
     * ListFolderLocksOnFolderRequest constructor.
     * @param array $query
     */
    public function __construct(array $query)
    {
        parent::__construct(query: $query);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('folder_locks');
    }
}