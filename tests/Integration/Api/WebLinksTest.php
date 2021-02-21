<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration\Api;

use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxConflictException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Requests\WebLinks\CreateWebLinkRequest;
use Mitquinn\BoxApiSdk\Requests\WebLinks\RemoveWebLinkRequest;
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
     * @param int $web_link_id
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteWebLink(int $web_link_id): void
    {
        $request = new RemoveWebLinkRequest($web_link_id);
        $noContent = $this->getBoxService()->webLinks()->removeWebLink($request);
        static::assertInstanceOf(NoContent::class, $noContent);
    }


    public function testCreateWebLink()
    {
        $body = [
            'name' => 'testing',
            'parent' => [
                'id' => '0'
            ],
            'url' => 'https://mitchellquinn.net'
        ];

        $request = new CreateWebLinkRequest($body);
        $webLink = $this->getBoxService()->webLinks()->createWebLink($request);
        static::assertInstanceOf(WebLink::class, $webLink);


        $this->deleteWebLink($webLink->getId());
    }

}