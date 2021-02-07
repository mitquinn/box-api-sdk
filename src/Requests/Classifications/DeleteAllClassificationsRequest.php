<?php

namespace Mitquinn\BoxApiSdk\Requests\Classifications;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;

/**
 * Class DeleteAllClassificationsRequest
 * @package Mitquinn\BoxApiSdk\Requests\Classifications
 */
class DeleteAllClassificationsRequest extends BaseRequest
{

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * DeleteAllClassificationsRequest constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('metadata_templates/enterprise/securityClassification-6VMVochwUWo/schema');
    }

}