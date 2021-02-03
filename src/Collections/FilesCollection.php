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
use Mitquinn\BoxApiSdk\Requests\Files\UpdateFileRequest;
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

    /**
     * @param GenericRequest|GetFileThumbnailRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getFileThumbnail(GenericRequest|GetFileThumbnailRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param GenericRequest|CopyFileRequest $request
     * @return FileResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function copyFile(GenericRequest|CopyFileRequest $request): FileResource
    {
        return $this->sendFileRequest($request);
    }

    /**
     * @param GenericRequest|UpdateFileRequest $request
     * @return FileResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateFile(GenericRequest|UpdateFileRequest $request): FileResource
    {
        return $this->sendFileRequest($request);
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
     * @param GenericRequest|ListFileCollaborationsRequest $request
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listFileCollaborations(GenericRequest|ListFileCollaborationsRequest $request): CollaborationsResource
    {
        return $this->sendCollaborationsRequest($request);
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