<?php


namespace Mitquinn\BoxApiSdk\Api;


use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\AddClassificationRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\AddInitialClassificationsRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\DeleteAllClassificationsRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\DeleteClassificationRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\ListAllClassificationsRequest;
use Mitquinn\BoxApiSdk\Requests\Classifications\UpdateClassificationRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\ClassificationTemplate;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class ClassificationsCollection
 * @package Mitquinn\BoxApiSdk\Collections
 * Todo: I do not understand how this API works. I will only offer access support. Please use Generic Requests.
 */
class Classifications extends Api
{

    /**
     * @param GenericRequest|ListAllClassificationsRequest $request
     * @return ClassificationTemplate
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listAllClassifications(GenericRequest $request): ClassificationTemplate
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|AddInitialClassificationsRequest $request
     * @return ClassificationTemplate
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function addInitialClassifications(GenericRequest $request): ClassificationTemplate
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|AddClassificationRequest $request
     * @return ClassificationTemplate
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function addClassification(GenericRequest $request): ClassificationTemplate
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|UpdateClassificationRequest $request
     * @return ClassificationTemplate
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateClassification(GenericRequest $request): ClassificationTemplate
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|DeleteClassificationRequest $request
     * @return ClassificationTemplate
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteClassification(GenericRequest $request): ClassificationTemplate
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|DeleteAllClassificationsRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteAllClassifications(GenericRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return ClassificationTemplate
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendClassificationTemplateRequest(BaseRequest $request): ClassificationTemplate
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        $this->validateResponse($response);

        return new ClassificationTemplate($response);
    }




}