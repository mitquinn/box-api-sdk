<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\CreateCollaborationRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\GetCollaborationRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\ListPendingCollaborationsRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\RemoveCollaborationRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\UpdateCollaborationRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationResource;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class CollaborationsCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class CollaborationsCollection extends BaseCollection
{

    /**
     * @param GenericRequest|GetCollaborationRequest $request
     * @return CollaborationResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getCollaboration(GenericRequest|GetCollaborationRequest $request): CollaborationResource
    {
        return $this->sendCollaborationRequest($request);
    }


    /**
     * @param GenericRequest|CreateCollaborationRequest $request
     * @return CollaborationResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createCollaboration(GenericRequest|CreateCollaborationRequest $request): CollaborationResource
    {
        return $this->sendCollaborationRequest($request);
    }

    /**
     * @param GenericRequest|UpdateCollaborationRequest $request
     * @return CollaborationResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateCollaboration(GenericRequest|UpdateCollaborationRequest $request): CollaborationResource
    {
        return $this->sendCollaborationRequest($request);
    }

    /**
     * @param GenericRequest|RemoveCollaborationRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeCollaboration(GenericRequest|RemoveCollaborationRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param ListPendingCollaborationsRequest $request
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listPendingCollaborations(ListPendingCollaborationsRequest $request): CollaborationsResource
    {
        return $this->sendCollaborationsRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return CollaborationResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendCollaborationRequest(BaseRequest $request): CollaborationResource
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        $this->validateResponse($response);

        return new CollaborationResource($response);
    }

}