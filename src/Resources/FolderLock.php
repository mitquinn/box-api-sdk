<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedAt;
use Mitquinn\BoxApiSdk\Traits\Properties\HasCreatedBy;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class FolderLockResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class FolderLock extends Resource
{
    use HasId, HasType, HasCreatedAt, HasCreatedBy;

    /** @var Folder $folder */
    protected Folder $folder;

    /** @var string $lock_type */
    protected string $lock_type;

    /** @var array $lock_operations */
    protected array $lock_operations;

    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        if ($collection->has('id')) {
            $this->setId($collection->get('id'));
        }

        if ($collection->has('type')) {
            $this->setType($collection->get('type'));
        }

        if ($collection->has('created_at')) {
            $this->setCreatedAt($collection->get('created_at'));
        }

        if ($collection->has('created_by')) {
            $this->setCreatedBy(new User($collection->get('created_by')));
        }

        if ($collection->has('folder')) {
            $this->setFolder(new Folder($collection->get('folder')));
        }

        if ($collection->has('lock_type')) {
            $this->setLockType($collection->get('lock_type'));
        }

        if ($collection->has('lock_operations')) {
            $this->setLockOperations($collection->get('lock_operations'));
        }

        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return Folder
     */
    public function getFolder(): Folder
    {
        return $this->folder;
    }

    /**
     * @param Folder $folder
     * @return FolderLock
     */
    public function setFolder(Folder $folder): FolderLock
    {
        $this->folder = $folder;
        return $this;
    }

    /**
     * @return string
     */
    public function getLockType(): string
    {
        return $this->lock_type;
    }

    /**
     * @param string $lock_type
     * @return FolderLock
     */
    public function setLockType(string $lock_type): FolderLock
    {
        $this->lock_type = $lock_type;
        return $this;
    }

    /**
     * @return array
     */
    public function getLockOperations(): array
    {
        return $this->lock_operations;
    }

    /**
     * @param array $lock_operations
     * @return FolderLock
     */
    public function setLockOperations(array $lock_operations): FolderLock
    {
        $this->lock_operations = $lock_operations;
        return $this;
    }

    /*** End Getters and Setters ***/

}