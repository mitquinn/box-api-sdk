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
     * @param int $web_link_id
     * @param array $header
     */
    public function __construct(int $web_link_id, array $header = [])
    {
        $this->setId($web_link_id);
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