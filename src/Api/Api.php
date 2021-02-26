<?php

namespace Mitquinn\BoxApiSdk\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Resources\CollaborationsResource;
use Mitquinn\BoxApiSdk\Resources\CommentsResource;
use Mitquinn\BoxApiSdk\Resources\GroupMembership;
use Mitquinn\BoxApiSdk\Resources\GroupMembershipsResource;
use Mitquinn\BoxApiSdk\Resources\ItemsResource;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Resources\Tasks\Tasks;
use Mitquinn\BoxApiSdk\Traits\CanValidateHttpResponse;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseCollection
 * @package Mitquinn\BoxApiSdk\Collections
 */
abstract class Api
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
     * @return ResponseInterface
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws BoxConflictException
     */
    private function sendRequest(BaseRequest $request): ResponseInterface
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return $response;
    }


    /**
     * @param BaseRequest $request
     * @return CollaborationsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     * @throws BoxConflictException
     */
    public function sendCollaborationsRequest(BaseRequest $request): CollaborationsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new CollaborationsResource($response);
    }


    /**
     * @param BaseRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendNoContentRequest(BaseRequest $request): NoContent
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new NoContent($response);
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
     * @param BaseRequest $request
     * @return GroupMembership
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendGroupMembershipRequest(BaseRequest $request): GroupMembership
    {
        return new GroupMembership($this->sendRequest($request));
    }


    /**
     * @param BaseRequest $request
     * @return GroupMembershipsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendGroupMembershipsRequest(BaseRequest $request): GroupMembershipsResource
    {
        return new GroupMembershipsResource($this->sendRequest($request));
    }

    /**
     * @param BaseRequest $request
     * @return CommentsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendCommentsRequest(BaseRequest $request): CommentsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new CommentsResource($response);
    }

    /**
     * @param BaseRequest $request
     * @return Tasks
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendTasksRequest(BaseRequest $request): Tasks
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new Tasks($response);
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
     * @return Api
     */
    public function setClient(ClientInterface $client): Api
    {
        $this->client = $client;
        return $this;
    }

}