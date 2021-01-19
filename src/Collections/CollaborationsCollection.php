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
     * @param int $id
     * @param array $query
     * @param GetCollaborationRequest|null $getCollaborationRequest
     * @return CollaborationResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getCollaboration(int $id, array $query = [], GetCollaborationRequest $getCollaborationRequest = null): CollaborationResource
    {
        if (is_null($getCollaborationRequest)) {
            $getCollaborationRequest = new GetCollaborationRequest(id: $id, query: $query);
        }

        return $this->sendCollaborationRequest($getCollaborationRequest);
    }


    /**
     * @param array $body
     * @param array $query
     * @param CreateCollaborationRequest|null $createCollaborationRequest
     * @return CollaborationResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createCollaboration(array $body, array $query = [], CreateCollaborationRequest $createCollaborationRequest = null): CollaborationResource
    {
        if (is_null($createCollaborationRequest)) {
            $createCollaborationRequest = new CreateCollaborationRequest(query: $query, body: $body);
        }

        return $this->sendCollaborationRequest($createCollaborationRequest);
    }

    /**
     * @param int $id
     * @param array $body
     * @param UpdateCollaborationRequest|null $updateCollaborationRequest
     * @return CollaborationResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateCollaboration(int $id, array $body, UpdateCollaborationRequest $updateCollaborationRequest = null): CollaborationResource
    {
        if (is_null($updateCollaborationRequest)) {
            $updateCollaborationRequest = new UpdateCollaborationRequest(id: $id, body: $body);
        }

        return $this->sendCollaborationRequest($updateCollaborationRequest);
    }

    /**
     * @param int $id
     * @param RemoveCollaborationRequest|null $removeCollaborationRequest
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeCollaboration(int $id, RemoveCollaborationRequest $removeCollaborationRequest = null): NoContentResource
    {
        if (is_null($removeCollaborationRequest)) {
            $removeCollaborationRequest = new RemoveCollaborationRequest($id);
        }

        return $this->sendNoContentRequest($removeCollaborationRequest);
    }

    /**
     * @param array $query
     * @param ListPendingCollaborationsRequest|null $listPendingCollaborationsRequest
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listPendingCollaborations(array $query, ListPendingCollaborationsRequest $listPendingCollaborationsRequest = null): CollaborationsResource
    {

        if (is_null($listPendingCollaborationsRequest)) {
            $listPendingCollaborationsRequest = new ListPendingCollaborationsRequest(query: $query);
        }

        return $this->sendCollaborationsRequest($listPendingCollaborationsRequest);
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