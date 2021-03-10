<?php

namespace Mitquinn\BoxApiSdk\Requests\Files;

use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetFileThumbnailRequest
 * @package Mitquinn\BoxApiSdk\Requests\Files
 */
class GetFileThumbnailRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /** @var string $extension */
    protected string $extension;

    /**
     * GetFileThumbnailRequest constructor.
     * @param string $id
     * @param string $extension
     * @param array $query
     * @throws BoxBadRequestException
     */
    public function __construct(string $id, string $extension, array $query = [])
    {
        $this->setId(id: $id);
        $this->setExtension(extension: $extension);
        parent::__construct(query: $query);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'files/'.$this->getId().'/thumbnail.'.$this->getExtension();
        return $this->generateUri(requestSegment: $requestSegment);
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     * @return GetFileThumbnailRequest
     * @throws BoxBadRequestException
     */
    public function setExtension(string $extension): GetFileThumbnailRequest
    {

        if ($extension !== 'png' and $extension !== 'jpg') {
            throw new BoxBadRequestException(message: 'The request thumbnail extension must be a jpg or png.');
        }
        $this->extension = $extension;
        return $this;
    }
}