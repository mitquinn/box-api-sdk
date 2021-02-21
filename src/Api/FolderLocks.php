<?php

namespace Mitquinn\BoxApiSdk\Api;

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
use Mitquinn\BoxApiSdk\Resources\FolderLock;
use Mitquinn\BoxApiSdk\Resources\FolderLocks as FolderLocksResource;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class FolderLocksApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class FolderLocks extends Api
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
     * @return FolderLock
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createFolderLockOnFolder(GenericRequest|CreateFolderLockOnFolderRequest $request): FolderLock
    {
        return $this->sendFolderLockRequest($request);
    }

    /**
     * @param GenericRequest|DeleteFolderLockRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFolderLock(GenericRequest|DeleteFolderLockRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return FolderLock
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendFolderLockRequest(BaseRequest $request): FolderLock
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new FolderLock($response);
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