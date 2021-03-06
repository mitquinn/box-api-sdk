<?php

namespace Mitquinn\BoxApiSdk\Api;

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
use Mitquinn\BoxApiSdk\Requests\Files\ListFileCommentsRequest;
use Mitquinn\BoxApiSdk\Requests\Files\ListTasksOnFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\UpdateFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\UploadFileRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\CommentsResource;
use Mitquinn\BoxApiSdk\Resources\File;
use Mitquinn\BoxApiSdk\Resources\Files as FilesResource;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Resources\Tasks\Tasks;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class FilesCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
class Files extends Api
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
     * @return File
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws BoxConflictException
     */
    public function getFileInformation(GenericRequest|GetFileInformationRequest $request): File
    {
        return $this->sendFileRequest($request);
    }

    /**
     * @param GenericRequest|GetFileThumbnailRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getFileThumbnail(GenericRequest|GetFileThumbnailRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param GenericRequest|CopyFileRequest $request
     * @return File
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function copyFile(GenericRequest|CopyFileRequest $request): File
    {
        return $this->sendFileRequest($request);
    }

    /**
     * @param GenericRequest|UpdateFileRequest $request
     * @return File
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateFile(GenericRequest|UpdateFileRequest $request): File
    {
        return $this->sendFileRequest($request);
    }

    /**
     * @param GenericRequest|DeleteFileRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFile(GenericRequest|DeleteFileRequest $request): NoContent
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
     * @param GenericRequest|ListFileCommentsRequest $request
     * @return CommentsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listFileComments(GenericRequest|ListFileCommentsRequest $request): CommentsResource
    {
        return $this->sendCommentsRequest($request);
    }

    /**
     * @param GenericRequest|ListTasksOnFileRequest $request
     * @return Tasks
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listTasksOnFile(GenericRequest|ListTasksOnFileRequest $request): Tasks
    {
        return $this->sendTasksRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return FilesResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
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
     * @return File
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws BoxConflictException
     */
    protected function sendFileRequest(BaseRequest $request): File
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        $this->validateResponse($response);

        return new File($response);
    }

}