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
     * CreateFolderRequest constructor.
     * Todo: Add validation for Body
     * @param array $query
     * @param array $body
     * @param array $header
     */
    public function __construct(array $query = [], array $body = [], array $header = [])
    {
        parent::__construct(query: $query, body: $body, header: $header);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->generateUri('folders');
    }
}