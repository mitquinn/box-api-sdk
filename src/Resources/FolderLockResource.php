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
class FolderLockResource extends BaseResource
{
    use HasId, HasType, HasCreatedAt, HasCreatedBy;

    /** @var FolderResource $folder */
    protected FolderResource $folder;

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
            $this->setCreatedBy(new UserResource($collection->get('created_by')));
        }

        if ($collection->has('folder')) {
            $this->setFolder(new FolderResource($collection->get('folder')));
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
     * @return FolderResource
     */
    public function getFolder(): FolderResource
    {
        return $this->folder;
    }

    /**
     * @param FolderResource $folder
     * @return FolderLockResource
     */
    public function setFolder(FolderResource $folder): FolderLockResource
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
     * @return FolderLockResource
     */
    public function setLockType(string $lock_type): FolderLockResource
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
     * @return FolderLockResource
     */
    public function setLockOperations(array $lock_operations): FolderLockResource
    {
        $this->lock_operations = $lock_operations;
        return $this;
    }

    /*** End Getters and Setters ***/

}