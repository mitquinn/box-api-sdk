<?php

namespace Mitquinn\BoxApiSdk\Apis;

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
use Mitquinn\BoxApiSdk\Resources\FileRequestResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class FileRequestApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class FileRequestApi extends BaseApi
{

    /**
     * @param GenericRequest|GetFileRequestRequest $request
     * @return FileRequestResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getFileRequest(GenericRequest|GetFileRequestRequest $request): FileRequestResource
    {
        return $this->sendFileRequestRequest($request);
    }

    /**
     * @param GenericRequest|CopyFileRequestRequest $request
     * @return FileRequestResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function copyFileRequest(GenericRequest|CopyFileRequestRequest $request): FileRequestResource
    {
        return $this->sendFileRequestRequest($request);
    }

    /**
     * @param GenericRequest|UpdateFileRequestRequest $request
     * @return FileRequestResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateFileRequest(GenericRequest|UpdateFileRequestRequest $request): FileRequestResource
    {
        return $this->sendFileRequestRequest($request);
    }

    /**
     * @param GenericRequest|DeleteFileRequestRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFileRequest(GenericRequest|DeleteFileRequestRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return FileRequestResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendFileRequestRequest(BaseRequest $request): FileRequestResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new FileRequestResource($response);
    }

}