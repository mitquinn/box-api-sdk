<?php

namespace Mitquinn\BoxApiSdk\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Requests\RecentItems\ListRecentlyAccessItemsRequest;
use Mitquinn\BoxApiSdk\Resources\RecentItems;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class RecentItemsApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class RecentItems extends Api
{

    /**
     * @param GenericRequest|ListRecentlyAccessItemsRequest $request
     * @return RecentItems
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listRecentlyAccessItems(GenericRequest|ListRecentlyAccessItemsRequest $request): RecentItems
    {
        return $this->sendRecentItemsRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return RecentItems
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendRecentItemsRequest(BaseRequest $request): RecentItems
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new RecentItems($response);
    }
}