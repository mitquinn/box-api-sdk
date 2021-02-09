<?php


namespace Mitquinn\BoxApiSdk\Apis;


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
use Mitquinn\BoxApiSdk\Resources\ClassificationTemplateResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class ClassificationsCollection
 * @package Mitquinn\BoxApiSdk\Collections
 * Todo: I do not understand how this API works. I will only offer access support. Please use Generic Requests.
 */
class ClassificationsApi extends BaseApi
{

    /**
     * @param GenericRequest|ListAllClassificationsRequest $request
     * @return ClassificationTemplateResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listAllClassifications(GenericRequest $request): ClassificationTemplateResource
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|AddInitialClassificationsRequest $request
     * @return ClassificationTemplateResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function addInitialClassifications(GenericRequest $request): ClassificationTemplateResource
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|AddClassificationRequest $request
     * @return ClassificationTemplateResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function addClassification(GenericRequest $request): ClassificationTemplateResource
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|UpdateClassificationRequest $request
     * @return ClassificationTemplateResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateClassification(GenericRequest $request): ClassificationTemplateResource
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|DeleteClassificationRequest $request
     * @return ClassificationTemplateResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteClassification(GenericRequest $request): ClassificationTemplateResource
    {
        return $this->sendClassificationTemplateRequest($request);
    }

    /**
     * @param GenericRequest|DeleteAllClassificationsRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteAllClassifications(GenericRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return ClassificationTemplateResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendClassificationTemplateRequest(BaseRequest $request): ClassificationTemplateResource
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        var_dump($response->getBody()->getContents());
        exit;

        $this->validateResponse($response);

        return new ClassificationTemplateResource($response);
    }




}