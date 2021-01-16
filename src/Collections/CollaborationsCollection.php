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
use Mitquinn\BoxApiSdk\Resources\CollaborationResource;
use Psr\Http\Client\ClientExceptionInterface;

class CollaborationsCollection extends BaseCollection
{

    public function getCollaboration(int $id, array $query = [], GetCollaborationRequest $getCollaborationRequest = null): CollaborationResource
    {
        if (is_null($getCollaborationRequest)) {
            $getCollaborationRequest = new GetCollaborationRequest(id: $id, query: $query);
        }

        return $this->sendCollaborationRequest($getCollaborationRequest);
    }

    public function createCollaboration(array $body, array $query = [], CreateCollaborationRequest $createCollaborationRequest = null): CollaborationResource
    {
        if (is_null($createCollaborationRequest)) {
            $createCollaborationRequest = new CreateCollaborationRequest(query: $query, body: $body);
        }

        return $this->sendCollaborationRequest($createCollaborationRequest);
    }

    public function updateCollaboration()
    {

    }

    public function removeCollaboration()
    {

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