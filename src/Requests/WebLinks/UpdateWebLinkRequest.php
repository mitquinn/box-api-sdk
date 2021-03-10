<?php

namespace Mitquinn\BoxApiSdk\Requests\WebLinks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class UpdateWebLinkRequest
 * @package Mitquinn\BoxApiSdk\Requests\WebLinks
 */
class UpdateWebLinkRequest extends BaseRequest
{
    use HasId;

    /** @var string $method */
    protected string $method = 'PUT';

    /**
     * UpdateWebLinkRequest constructor.
     * @param string $webLinkId
     * @param array $body
     */
    public function __construct(string $webLinkId, array $body = [])
    {
        $this->setId($webLinkId);
        parent::__construct(body: $body);
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