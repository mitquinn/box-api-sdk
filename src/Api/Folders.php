<?php

namespace Mitquinn\BoxApiSdk\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
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
use Mitquinn\BoxApiSdk\Resources\Folder;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use PhpParser\Node\Param;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class FoldersCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class Folders extends Api
{

    /**
     * @param GenericRequest|GetFolderInformationRequest $request
     * @return Folder
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getFolderInformation(GenericRequest|GetFolderInformationRequest $request): Folder
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
     * @return Folder
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createFolder(GenericRequest|CreateFolderRequest $request): Folder
    {
        return $this->sendFolderRequest($request);
    }

    /**
     * @param GenericRequest|DeleteFolderRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFolder(GenericRequest|DeleteFolderRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param GenericRequest|UpdateFolderRequest $updateFolderRequest
     * @return Folder
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateFolder(GenericRequest|UpdateFolderRequest $updateFolderRequest): Folder
    {
        return $this->sendFolderRequest($updateFolderRequest);
    }

    /**
     * @param GenericRequest|ListFolderCollaborationsRequest $request
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listFolderCollaborations(GenericRequest|ListFolderCollaborationsRequest $request): CollaborationsResource
    {
        return $this->sendCollaborationsRequest($request);
    }

    /**
     * @param GenericRequest|CopyFolderRequest $request
     * @return Folder
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function copyFolder(GenericRequest|CopyFolderRequest $request): Folder
    {
        return $this->sendFolderRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return Folder
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendFolderRequest(BaseRequest $request): Folder
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new Folder($response);

    }

}