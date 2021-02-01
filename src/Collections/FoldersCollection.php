<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\CopyFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\CreateFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\DeleteFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\GetFolderInformationRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\ListFolderCollaborationsRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\ListItemsInFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\UpdateFolderRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\FolderResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use PhpParser\Node\Param;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class FoldersCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class FoldersCollection extends BaseCollection
{

    /**
     * @param GenericRequest|GetFolderInformationRequest $request
     * @return FolderResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getFolderInformation(GenericRequest|GetFolderInformationRequest $request): FolderResource
    {
        return $this->sendFolderRequest($request);
    }

    /**
     * @param GenericRequest|ListItemsInFolderRequest $request
     * @return ItemsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listItemsInFolder(GenericRequest|ListItemsInFolderRequest $request): ItemsResource
    {
        return $this->sendItemsRequest($request);
    }

    /**
     * @param GenericRequest|CreateFolderRequest $request
     * @return FolderResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createFolder(GenericRequest|CreateFolderRequest $request): FolderResource
    {
        return $this->sendFolderRequest($request);
    }

    /**
     * @param GenericRequest|DeleteFolderRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFolder(GenericRequest|DeleteFolderRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param GenericRequest|UpdateFolderRequest $updateFolderRequest
     * @return FolderResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateFolder(GenericRequest|UpdateFolderRequest $updateFolderRequest): FolderResource
    {
        return $this->sendFolderRequest($updateFolderRequest);
    }

    /**
     * @param int $id
     * @param array $query
     * @param ListFolderCollaborationsRequest|null $listFolderCollaborationsRequest
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws \Mitquinn\BoxApiSdk\Exceptions\BoxConflictException
     */
    public function listFolderCollaborations(int $id, array $query = [], ListFolderCollaborationsRequest $listFolderCollaborationsRequest = null): CollaborationsResource
    {
        if (is_null($listFolderCollaborationsRequest)) {
            $listFolderCollaborationsRequest = new ListFolderCollaborationsRequest(id: $id, query: $query);
        }

        return $this->sendCollaborationsRequest($listFolderCollaborationsRequest);
    }




    /**
     * @param int $id
     * @param array $body
     * @param array $query
     * @param CopyFolderRequest|null $copyFolderRequest
     * @return FolderResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function copyFolder(int $id, array $body, array $query = [], CopyFolderRequest $copyFolderRequest = null): FolderResource
    {
        if (is_null($copyFolderRequest)) {
            $copyFolderRequest = new CopyFolderRequest(id: $id, body: $body, query: $query);
        }

        return $this->sendFolderRequest($copyFolderRequest);
    }


    /**
     * @param BaseRequest $request
     * @return FolderResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendFolderRequest(BaseRequest $request): FolderResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new FolderResource($response);

    }

}