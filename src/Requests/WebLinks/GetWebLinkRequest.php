<?php

namespace Mitquinn\BoxApiSdk\Requests\WebLinks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetWebLinkRequest
 * @package Mitquinn\BoxApiSdk\Requests\WebLinks
 */
class GetWebLinkRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * GetWebLinkRequest constructor.
     * @param string $webLinkId
     * @param array $header
     */
    public function __construct(string $webLinkId, array $header = [])
    {
        $this->setId($webLinkId);
        parent::__construct(header: $header);
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'web_links/'.$this->getId();
        return $this->generateUri($requestSegment);
    }
}