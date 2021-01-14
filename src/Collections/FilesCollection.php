<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Files\CopyFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\DeleteFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\GetFileInformationRequest;
use Mitquinn\BoxApiSdk\Requests\Files\GetFileThumbnailRequest;
use Mitquinn\BoxApiSdk\Requests\Files\UploadFileRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\CopyFolderRequest;
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

    public function uploadFile(array $body, array $query = [], array $header = [], UploadFileRequest $uploadFileRequest = null): FilesResource
    {
        if (is_null($uploadFileRequest)) {
            $uploadFileRequest = new UploadFileRequest(query: $query, body: $body, header: $header);
        }

        return $this->sendFilesRequest($uploadFileRequest);
    }

    public function getFileInformation(int $id, array $query = [], array $header = [], GetFileInformationRequest $getFileInformationRequest = null): FileResource
    {
        if (is_null($getFileInformationRequest)) {
            $getFileInformationRequest = new GetFileInformationRequest(id: $id, query: $query, header: $header);
        }

        return $this->sendFileRequest($getFileInformationRequest);

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
     * @param int $id
     * @param array $header
     * @param DeleteFileRequest|null $deleteFileRequest
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFile(int $id, array $header = [], DeleteFileRequest $deleteFileRequest = null): NoContentResource
    {
        if (is_null($deleteFileRequest)) {
            $deleteFileRequest = new DeleteFileRequest(id: $id, header: $header);
        }

        return $this->sendNoContentRequest($deleteFileRequest);
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
     * @throws \Mitquinn\BoxApiSdk\Exceptions\BoxConflictException
     */
    protected function sendFileRequest(BaseRequest $request): FileResource
    {
        $request = $request->generateRequestInterface();

        $response = $this->getClient()->sendRequest($request);

        $this->validateResponse($response);

        return new FileResource($response);
    }

}