<?php


namespace Mitquinn\BoxApiSdk\Api;


use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Requests\WebLinks\CreateWebLinkRequest;
use Mitquinn\BoxApiSdk\Requests\WebLinks\GetWebLinkRequest;
use Mitquinn\BoxApiSdk\Requests\WebLinks\RemoveWebLinkRequest;
use Mitquinn\BoxApiSdk\Requests\WebLinks\UpdateWebLinkRequest;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Resources\WebLinks\WebLink;
use Psr\Http\Client\ClientExceptionInterface;

class WebLinks extends Api
{

    /**
     * @param GenericRequest|GetWebLinkRequest $request
     * @return WebLink
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function getWebLink(GenericRequest|GetWebLinkRequest $request): WebLink
    {
        return $this->sendWebLinkRequest($request);
    }

    /**
     * @param GenericRequest|CreateWebLinkRequest $request
     * @return WebLink
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createWebLink(GenericRequest|CreateWebLinkRequest $request): WebLink
    {
        return $this->sendWebLinkRequest($request);
    }

    /**
     * @param GenericRequest|UpdateWebLinkRequest $request
     * @return WebLink
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function updateWebLink(GenericRequest|UpdateWebLinkRequest $request): WebLink
    {
        return $this->sendWebLinkRequest($request);
    }

    /**
     * @param GenericRequest|RemoveWebLinkRequest $request
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function removeWebLink(GenericRequest|RemoveWebLinkRequest $request): NoContent
    {
        return $this->sendNoContentRequest($request);
    }

    /**
     * @param BaseRequest $request
     * @return WebLink
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendWebLinkRequest(BaseRequest $request): WebLink
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new WebLink($response);
    }
}