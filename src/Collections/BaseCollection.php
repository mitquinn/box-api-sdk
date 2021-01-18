<?php

namespace Mitquinn\BoxApiSdk\Collections;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Mitquinn\BoxApiSdk\Traits\CanValidateHttpResponse;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;

/**
 * Class BaseCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
abstract class BaseCollection
{
    use CanValidateHttpResponse;

    /** @var ClientInterface $client */
    protected ClientInterface $client;

    /**
     * BaseCollection constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->setClient($client);
    }

    /**
     * @param BaseRequest $request
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws \Mitquinn\BoxApiSdk\Exceptions\BoxConflictException
     */
    public function sendCollaborationsRequest(BaseRequest $request): CollaborationsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new CollaborationsResource($response);
    }


    /**
     * @param BaseRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendNoContentRequest(BaseRequest $request): NoContentResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new NoContentResource($response);

    }

    /**
     * @param BaseRequest $request
     * @return ItemsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendItemsRequest(BaseRequest $request): ItemsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new ItemsResource($response);
    }


    /**
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        return $this->client;
    }

    /**
     * @param ClientInterface $client
     * @return BaseCollection
     */
    public function setClient(ClientInterface $client): BaseCollection
    {
        $this->client = $client;
        return $this;
    }

}