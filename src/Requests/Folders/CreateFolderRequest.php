<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class CreateFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class CreateFolderRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'POST';

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->generateUri('folders');
    }
}