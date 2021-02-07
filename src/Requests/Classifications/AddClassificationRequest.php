<?php


namespace Mitquinn\BoxApiSdk\Requests\Classifications;


use Mitquinn\BoxApiSdk\Requests\BaseRequest;

class AddClassificationRequest extends BaseRequest
{
    protected string $method = 'PUT';

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        // TODO: Implement getUri() method.
    }
}