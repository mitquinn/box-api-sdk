<?php

namespace Mitquinn\BoxApiSdk\Requests\WebLinks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class RemoveWebLinkRequest
 * @package Mitquinn\BoxApiSdk\Requests\WebLinks
 */
class RemoveWebLinkRequest extends BaseRequest
{

    use HasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * GetWebLinkRequest constructor.
     * @param string $webLinkId
     */
    public function __construct(string $webLinkId)
    {
        $this->setId($webLinkId);
        parent::__construct();
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