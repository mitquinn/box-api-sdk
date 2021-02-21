<?php

namespace Mitquinn\BoxApiSdk\Api;

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
use Mitquinn\BoxApiSdk\Resources\Comment;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class CommentsApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class Comments extends Api
{

    /**
     * @param GenericRequest|GetCommentRequest $request
     * @return Comment
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getComment(GenericRequest|GetCommentRequest $request): Comment
    {
        return $this->sendCommentRequest($request);
    }

    /**
     * @param GenericRequest|CreateCommentRequest $request
     * @return Comment
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createComment(GenericRequest|CreateCommentRequest $request): Comment
    {
        return $this->sendCommentRequest($request);
    }

    /**
     * @param GenericRequest|UpdateCommentRequest $request
     * @return Comment
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateComment(GenericRequest|UpdateCommentRequest $request): Comment
    {
        return $this->sendCommentRequest($request);
    }


    /**
     * @param GenericRequest|RemoveCommentRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeComment(GenericRequest|RemoveCommentRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return Comment
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendCommentRequest(BaseRequest $request): Comment
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new Comment($response);
    }

}