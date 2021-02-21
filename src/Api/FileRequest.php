<?php

namespace Mitquinn\BoxApiSdk\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\FileRequests\CopyFileRequestRequest;
use Mitquinn\BoxApiSdk\Requests\FileRequests\DeleteFileRequestRequest;
use Mitquinn\BoxApiSdk\Requests\FileRequests\GetFileRequestRequest;
use Mitquinn\BoxApiSdk\Requests\FileRequests\UpdateFileRequestRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\FileRequest;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class FileRequestApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class FileRequest extends Api
{

    /**
     * @param GenericRequest|GetFileRequestRequest $request
     * @return FileRequest
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getFileRequest(GenericRequest|GetFileRequestRequest $request): FileRequest
    {
        return $this->sendFileRequestRequest($request);
    }

    /**
     * @param GenericRequest|CopyFileRequestRequest $request
     * @return FileRequest
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function copyFileRequest(GenericRequest|CopyFileRequestRequest $request): FileRequest
    {
        return $this->sendFileRequestRequest($request);
    }

    /**
     * @param GenericRequest|UpdateFileRequestRequest $request
     * @return FileRequest
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateFileRequest(GenericRequest|UpdateFileRequestRequest $request): FileRequest
    {
        return $this->sendFileRequestRequest($request);
    }

    /**
     * @param GenericRequest|DeleteFileRequestRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFileRequest(GenericRequest|DeleteFileRequestRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return FileRequest
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendFileRequestRequest(BaseRequest $request): FileRequest
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new FileRequest($response);
    }

}