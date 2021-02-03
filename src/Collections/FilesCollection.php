<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Files\CopyFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\DeleteFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\GetFileInformationRequest;
use Mitquinn\BoxApiSdk\Requests\Files\GetFileThumbnailRequest;
use Mitquinn\BoxApiSdk\Requests\Files\ListFileCollaborationsRequest;
use Mitquinn\BoxApiSdk\Requests\Files\UploadFileRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\CopyFolderRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\FileResource;
use Mitquinn\BoxApiSdk\Resources\FilesResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class FilesCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class FilesCollection extends BaseCollection
{

    /**
     * @param GenericRequest|UploadFileRequest $request
     * @return FilesResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function uploadFile(GenericRequest|UploadFileRequest $request): FilesResource
    {
        return $this->sendFilesRequest($request);
    }

    /**
     * @param GenericRequest|GetFileInformationRequest $request
     * @return FileResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws BoxConflictException
     */
    public function getFileInformation(GenericRequest|GetFileInformationRequest $request): FileResource
    {
        return $this->sendFileRequest($request);
    }

    public function getFileThumbnail(int $id, string $extension, array $query = [], GetFileThumbnailRequest $getFileThumbnailRequest = null): NoContentResource
    {
        if (is_null($getFileThumbnailRequest)) {
            $getFileThumbnailRequest = new GetFileThumbnailRequest(id: $id, extension: $extension, query: $query);
        }

        return $this->sendNoContentRequest($getFileThumbnailRequest);
    }

    public function copyFile(int $id, array $body, array $query = [], CopyFileRequest $copyFileRequest = null ): FileResource
    {
        if (is_null($copyFileRequest)) {
            $copyFileRequest = new CopyFileRequest(id: $id, body: $body, query: $query);
        }

        return $this->sendFileRequest($copyFileRequest);
    }

    public function updateFile()
    {

    }

    /**
     * @param GenericRequest|DeleteFileRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFile(GenericRequest|DeleteFileRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param int $id
     * @param array $query
     * @param ListFileCollaborationsRequest|null $listFileCollaborationsRequest
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws BoxConflictException
     */
    public function listFileCollaborations(int $id, array $query = [], ListFileCollaborationsRequest $listFileCollaborationsRequest = null): CollaborationsResource
    {
        if (is_null($listFileCollaborationsRequest)) {
            $listFileCollaborationsRequest = new ListFileCollaborationsRequest(id: $id, query: $query);
        }

        return $this->sendCollaborationsRequest($listFileCollaborationsRequest);
    }



    /**
     * @param BaseRequest $request
     * @return FilesResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendFilesRequest(BaseRequest $request): FilesResource
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        $this->validateResponse($response);

        return new FilesResource($response);
    }

    /**
     * @param BaseRequest $request
     * @return FileResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws BoxConflictException
     */
    protected function sendFileRequest(BaseRequest $request): FileResource
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        $this->validateResponse($response);

        return new FileResource($response);
    }

}