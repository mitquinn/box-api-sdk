<?php

namespace Mitquinn\BoxApiSdk\Apis;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\FolderLocks\CreateFolderLockOnFolderRequest;
use Mitquinn\BoxApiSdk\Requests\FolderLocks\DeleteFolderLockRequest;
use Mitquinn\BoxApiSdk\Requests\FolderLocks\ListFolderLocksOnFolderRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\FolderLockResource;
use Mitquinn\BoxApiSdk\Resources\FolderLocksResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class FolderLocksApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class FolderLocksApi extends BaseApi
{

    /**
     * @param GenericRequest|ListFolderLocksOnFolderRequest $request
     * @return FolderLocksResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listFolderLocksOnFolder(GenericRequest|ListFolderLocksOnFolderRequest $request): FolderLocksResource
    {
        return $this->sendFolderLocksRequest($request);
    }

    /**
     * @param GenericRequest|CreateFolderLockOnFolderRequest $request
     * @return FolderLockResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createFolderLockOnFolder(GenericRequest|CreateFolderLockOnFolderRequest $request): FolderLockResource
    {
        return $this->sendFolderLockRequest($request);
    }

    /**
     * @param GenericRequest|DeleteFolderLockRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFolderLock(GenericRequest|DeleteFolderLockRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return FolderLockResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendFolderLockRequest(BaseRequest $request): FolderLockResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new FolderLockResource($response);
    }

    /**
     * @param BaseRequest $request
     * @return FolderLocksResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendFolderLocksRequest(BaseRequest $request): FolderLocksResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new FolderLocksResource($response);
    }

}