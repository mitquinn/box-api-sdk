<?php

namespace Mitquinn\BoxApiSdk\Requests\FolderLocks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class DeleteFolderLockRequest
 * @package Mitquinn\BoxApiSdk\Requests\FolderLocks
 */
class DeleteFolderLockRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * DeleteFolderLockRequest constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->setId($id);
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'folder_locks/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}