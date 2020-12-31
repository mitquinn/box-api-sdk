<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\GetFolderInformationRequest;
use Mitquinn\BoxApiSdk\Resources\FolderResource;

/**
 * Class FoldersCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class FoldersCollection extends BaseCollection
{

    public function getFolderInformation(int $id, array $query = [], GetFolderInformationRequest $getFolderInformationRequest = null): FolderResource
    {
        if (is_null($getFolderInformationRequest)) {
            $getFolderInformationRequest = new GetFolderInformationRequest(id: $id, query: $query);
        }

        return $this->sendFolderRequest($getFolderInformationRequest);

    }

    protected function sendFolderRequest(BaseRequest $request): FolderResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new FolderResource($response);

    }

}