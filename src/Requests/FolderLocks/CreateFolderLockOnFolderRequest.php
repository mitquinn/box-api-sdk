<?php

namespace Mitquinn\BoxApiSdk\Requests\FolderLocks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class CreateFolderLockOnFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\FolderLocks
 */
class CreateFolderLockOnFolderRequest extends BaseRequest
{

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CreateFolderLockOnFolderRequest constructor.
     * @param array $body
     */
    public function __construct(array $body)
    {
        parent::__construct(body: $body);
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('folder_locks');
    }
}