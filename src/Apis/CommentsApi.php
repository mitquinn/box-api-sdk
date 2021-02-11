<?php

namespace Mitquinn\BoxApiSdk\Apis;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Comments\CreateCommentRequest;
use Mitquinn\BoxApiSdk\Requests\Comments\GetCommentRequest;
use Mitquinn\BoxApiSdk\Requests\Comments\RemoveCommentRequest;
use Mitquinn\BoxApiSdk\Requests\Comments\UpdateCommentRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\CommentResource;
use Mitquinn\BoxApiSdk\Resources\NoContentResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class CommentsApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class CommentsApi extends BaseApi
{

    /**
     * @param GenericRequest|GetCommentRequest $request
     * @return CommentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getComment(GenericRequest|GetCommentRequest $request): CommentResource
    {
        return $this->sendCommentRequest($request);
    }

    /**
     * @param GenericRequest|CreateCommentRequest $request
     * @return CommentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createComment(GenericRequest|CreateCommentRequest $request): CommentResource
    {
        return $this->sendCommentRequest($request);
    }

    /**
     * @param GenericRequest|UpdateCommentRequest $request
     * @return CommentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateComment(GenericRequest|UpdateCommentRequest $request): CommentResource
    {
        return $this->sendCommentRequest($request);
    }


    /**
     * @param GenericRequest|RemoveCommentRequest $request
     * @return NoContentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeComment(GenericRequest|RemoveCommentRequest $request): NoContentResource
    {
        return $this->sendNoContentRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return CommentResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendCommentRequest(BaseRequest $request): CommentResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());

        $this->validateResponse($response);

        return new CommentResource($response);
    }

}