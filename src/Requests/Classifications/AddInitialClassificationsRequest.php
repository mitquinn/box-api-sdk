<?php

namespace Mitquinn\BoxApiSdk\Requests\Classifications;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class AddInitialClassificationsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Classifications
 */
class AddInitialClassificationsRequest extends BaseRequest
{

    protected string $method = 'POST';

    /**
     * AddInitialClassificationsRequest constructor.
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
        return $this->generateUri('metadata_templates/schema');
    }

}