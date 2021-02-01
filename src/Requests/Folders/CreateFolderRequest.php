<?php

namespace Mitquinn\BoxApiSdk\Requests\Folders;

use Adbar\Dot;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class CreateFolderRequest
 * @package Mitquinn\BoxApiSdk\Requests\Folders
 */
class CreateFolderRequest extends BaseRequest
{
    /** @var string $method */
    protected string $method = 'POST';

    public function __construct(array $body, array $query = [])
    {
        parent::__construct(query: $query, body: $body);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->generateUri('folders');
    }

    public function validateBody(array $body): bool
    {
        $dot = new Dot($body);
        if ($dot->isEmpty(['name', 'parent.id'])) {
            throw new BoxBadRequestException();
        }

        return true;
    }
}