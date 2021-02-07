<?php


namespace Mitquinn\BoxApiSdk\Requests\Classifications;


class ListAllClassificationsRequest extends \Mitquinn\BoxApiSdk\Requests\BaseRequest
{
    /** @var string $method */
    protected string $method = 'GET';


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return $this->generateUri('metadata_templates/enterprise/securityClassification-6VMVochwUWo/schema');
    }
}