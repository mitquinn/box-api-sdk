<?php

namespace Mitquinn\BoxApiSdk\Apis;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Collections\ListAllCollectionsRequest;
use Mitquinn\BoxApiSdk\Requests\Collections\ListCollectionItemsRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\CollectionsResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class CollectionsApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class CollectionsApi extends BaseApi
{

    /**
     * @param GenericRequest|ListAllCollectionsRequest $request
     * @return CollectionsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listAllCollections(GenericRequest|ListAllCollectionsRequest $request): CollectionsResource
    {
        return $this->sendCollectionsRequest($request);
    }

    /**
     * @param GenericRequest|ListCollectionItemsRequest $request
     * @return ItemsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listCollectionItems(GenericRequest|ListCollectionItemsRequest $request): ItemsResource
    {
        return $this->sendItemsRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return CollectionsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendCollectionsRequest(BaseRequest $request): CollectionsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new CollectionsResource($response);
    }

}