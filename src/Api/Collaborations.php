<?php

namespace Mitquinn\BoxApiSdk\Api;

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
use Mitquinn\BoxApiSdk\Resources\Collaboration;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class CollaborationsCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class Collaborations extends Api
{

    /**
     * @param GenericRequest|GetCollaborationRequest $request
     * @return Collaboration
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getCollaboration(GenericRequest|GetCollaborationRequest $request): Collaboration
    {
        return $this->sendCollaborationRequest($request);
    }


    /**
     * @param GenericRequest|CreateCollaborationRequest $request
     * @return Collaboration
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createCollaboration(GenericRequest|CreateCollaborationRequest $request): Collaboration
    {
        return $this->sendCollaborationRequest($request);
    }

    /**
     * @param GenericRequest|UpdateCollaborationRequest $request
     * @return Collaboration
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateCollaboration(GenericRequest|UpdateCollaborationRequest $request): Collaboration
    {
        return $this->sendCollaborationRequest($request);
    }

    /**
     * @param GenericRequest|RemoveCollaborationRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeCollaboration(GenericRequest|RemoveCollaborationRequest $request): NoContent
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
     * @return Collaboration
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendCollaborationRequest(BaseRequest $request): Collaboration
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        $this->validateResponse($response);

        return new Collaboration($response);
    }

}