<?php

namespace Mitquinn\BoxApiSdk\Requests\WebLinks;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class CreateWebLinkRequest
 * @package Mitquinn\BoxApiSdk\Requests\WebLinks
 */
class CreateWebLinkRequest extends BaseRequest
{

    /** @var string $method */
    protected string $method = 'POST';

    /**
     * CreateWebLinkRequest constructor.
     * @param array $body
     */
    public function __construct(array $body)
    {
        parent::__construct(body: $body);
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('web_links');
    }
}