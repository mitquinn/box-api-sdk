<?php

namespace Mitquinn\BoxApiSdk\Apis;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Requests\RecentItems\ListRecentlyAccessItemsRequest;
use Mitquinn\BoxApiSdk\Resources\RecentItemsResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class RecentItemsApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class RecentItemsApi extends BaseApi
{

    /**
     * @param GenericRequest|ListRecentlyAccessItemsRequest $request
     * @return RecentItemsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listRecentlyAccessItems(GenericRequest|ListRecentlyAccessItemsRequest $request): RecentItemsResource
    {
        return $this->sendRecentItemsRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return RecentItemsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendRecentItemsRequest(BaseRequest $request): RecentItemsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new RecentItemsResource($response);
    }
}