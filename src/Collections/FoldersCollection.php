<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\CreateFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\DeleteFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\GetFolderInformationRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\ListItemsInFolderRequest;
use Mitquinn\BoxApiSdk\Resources\FolderResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

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
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
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

    /**
     * @param int $id
     * @param array $query
     * @param array $header
     * @param DeleteFolderRequest|null $deleteFolderRequest
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFolder(int $id, array $query = [], array $header = [], DeleteFolderRequest $deleteFolderRequest = null)
    {
        if (is_null($deleteFolderRequest)) {
            $deleteFolderRequest = new DeleteFolderRequest(id: $id, query: $query, header: $header);
        }

        return $this->sendNoContentRequest($deleteFolderRequest);
    }



    protected function sendFolderRequest(BaseRequest $request): FolderResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new FolderResource($response);

    }

}