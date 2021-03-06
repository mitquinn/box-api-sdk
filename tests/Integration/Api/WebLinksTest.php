<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\WebLinks\CreateWebLinkRequest;
use Mitquinn\BoxApiSdk\Requests\WebLinks\GetWebLinkRequest;
use Mitquinn\BoxApiSdk\Requests\WebLinks\RemoveWebLinkRequest;
use Mitquinn\BoxApiSdk\Requests\WebLinks\UpdateWebLinkRequest;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use Mitquinn\BoxApiSdk\Resources\WebLinks\WebLink;
use Mitquinn\BoxApiSdk\Tests\Integration\BaseTest;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class WebLinksTest
 * @package Mitquinn\BoxApiSdk\Tests\Integration\Api
 */
class WebLinksTest extends BaseTest
{


    /**
     * @param string $webLinkId
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteWebLink(string $webLinkId): void
    {
        $request = new RemoveWebLinkRequest($webLinkId);
        $noContent = $this->getBoxService()->webLinks()->removeWebLink($request);
        static::assertInstanceOf(NoContent::class, $noContent);
    }

    /**
     * @return WebLink
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxConflictException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function createWebLink(): WebLink
    {
        $body = [
            'name' => 'testing',
            'parent' => [
                'id' => "0"
            ],
            'url' => 'https://mitchellquinn.net'
        ];

        $request = new CreateWebLinkRequest($body);
        $webLink = $this->getBoxService()->webLinks()->createWebLink($request);
        static::assertInstanceOf(WebLink::class, $webLink);
        return $webLink;
    }


    public function testCreateWebLink()
    {
        $webLink = $this->createWebLink();
        $this->deleteWebLink($webLink->getId());
    }

    public function testGetWebLink()
    {
        $webLink = $this->createWebLink();

        $request = new GetWebLinkRequest($webLink->getId());
        $webLink2 = $this->getBoxService()->webLinks()->getWebLink($request);
        static::assertInstanceOf(WebLink::class, $webLink2);

        $this->deleteWebLink($webLink2->getId());
    }

    public function testUpdateWebLink()
    {
        $webLink = $this->createWebLink();

        $body = [
            'name' => 'Updated WebLink'
        ];

        $request = new UpdateWebLinkRequest($webLink->getId(), $body);
        $webLink2 = $this->getBoxService()->webLinks()->updateWebLink($request);
        static::assertInstanceOf(WebLink::class, $webLink2);
        static::assertEquals('Updated WebLink', $webLink2->getName());

        $this->deleteWebLink($webLink2->getId());
    }

}