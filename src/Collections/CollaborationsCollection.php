<?php


namespace Mitquinn\BoxApiSdk\Collections;


use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Collaborations\CreateCollaborationRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationResource;

class CollaborationsCollection extends BaseCollection
{

    public function getCollaboration()
    {

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


    protected function sendCollaborationRequest(BaseRequest $request)
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        $this->validateResponse($response);

        return new CollaborationResource($response);

    }

}