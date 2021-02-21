<?php

namespace Mitquinn\BoxApiSdk\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Requests\Events\ListUserAndEnterpriseEventsRequest;
use Mitquinn\BoxApiSdk\Requests\GenericRequest;
use Mitquinn\BoxApiSdk\Resources\Events as EventsResource;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class EventApi
 * @package Mitquinn\BoxApiSdk\Apis
 */
class Events extends Api
{

    /**
     * @param GenericRequest|ListUserAndEnterpriseEventsRequest $request
     * @return EventsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function listUserAndEnterpriseEvents(GenericRequest|ListUserAndEnterpriseEventsRequest $request): EventsResource
    {
        return $this->sendEventsRequest($request);
    }


    /**
     * @param BaseRequest $request
     * @return EventsResource
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    protected function sendEventsRequest(BaseRequest $request): EventsResource
    {
        $response = $this->getClient()->sendRequest($request->generateRequestInterface());
        $this->validateResponse($response);
        return new EventsResource($response);
    }


}