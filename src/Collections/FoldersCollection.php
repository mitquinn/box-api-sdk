<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\CreateFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\GetFolderInformationRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\ListItemsInFolderRequest;
use Mitquinn\BoxApiSdk\Resources\FolderResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;

/**
 * Class FoldersCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class FoldersCollection extends BaseCollection
{

    /**
     * @param int $id
     * @param array $query
     * @param GetFolderInformationRequest|null $getFolderInformationRequest
     * @return FolderResource
     */
    public function getFolderInformation(int $id, array $query = [], GetFolderInformationRequest $getFolderInformationRequest = null): FolderResource
    {
        if (is_null($getFolderInformationRequest)) {
            $getFolderInformationRequest = new GetFolderInformationRequest(id: $id, query: $query);
        }

        return $this->sendFolderRequest($getFolderInformationRequest);

    }

    /**
     * @param int $id
     * @param array $query
     * @param ListItemsInFolderRequest|null $listItemsInFolderRequest
     * @return ItemsResource
     */
    public function listItemsInFolder(int $id, array $query = [], ListItemsInFolderRequest $listItemsInFolderRequest = null): ItemsResource
    {
        if (is_null($listItemsInFolderRequest)) {
            $listItemsInFolderRequest = new ListItemsInFolderRequest(id: $id, query: $query);
        }

        return $this->sendItemsRequest($listItemsInFolderRequest);
    }

    /**
     * @param array $body
     * @param array $query
     * @param CreateFolderRequest|null $createFolderRequest
     * @return FolderResource
     */
    public function createFolder(array $body, array $query = [], CreateFolderRequest $createFolderRequest = null): FolderResource
    {
        if (is_null($createFolderRequest)) {
            $createFolderRequest = new CreateFolderRequest(query: $query, body: $body);
        }

        return $this->sendFolderRequest($createFolderRequest);
    }





    protected function sendItemsRequest(BaseRequest $request): ItemsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new ItemsResource($response);
    }


    protected function sendFolderRequest(BaseRequest $request): FolderResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new FolderResource($response);

    }

}