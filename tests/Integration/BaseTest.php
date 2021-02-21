<?php

namespace Mitquinn\BoxApiSdk\Tests\Integration;

use Carbon\Carbon;
use Faker\Factory;
use Faker\Generator;
use GuzzleHttp\Exception\GuzzleException;
use Mitquinn\BoxApiSdk\AuthorizationConfigurations\ServerAuthorization;
use Mitquinn\BoxApiSdk\BoxService;
use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Exceptions\BoxBadRequestException;
use Mitquinn\BoxApiSdk\Exceptions\BoxForbiddenException;
use Mitquinn\BoxApiSdk\Exceptions\BoxNotFoundException;
use Mitquinn\BoxApiSdk\Interfaces\AuthorizationInterface;
use Mitquinn\BoxApiSdk\Requests\Collaborations\CreateCollaborationRequest;
use Mitquinn\BoxApiSdk\Requests\Files\DeleteFileRequest;
use Mitquinn\BoxApiSdk\Requests\Files\UploadFileRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\CreateFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Folders\DeleteFolderRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\CreateGroupRequest;
use Mitquinn\BoxApiSdk\Requests\Groups\RemoveGroupRequest;
use Mitquinn\BoxApiSdk\Resources\Collaboration;
use Mitquinn\BoxApiSdk\Resources\File;
use Mitquinn\BoxApiSdk\Resources\Files;
use Mitquinn\BoxApiSdk\Resources\Folder;
use Mitquinn\BoxApiSdk\Resources\Group;
use Mitquinn\BoxApiSdk\Resources\NoContent;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;
use Symfony\Component\Dotenv\Dotenv;

/**
 * Class BaseTest
 * @package Mitquinn\BoxApiSdk\Tests\Integration\Api
 */
abstract class BaseTest extends TestCase
{

    /** @var Generator $faker */
    protected Generator $faker;

    /** @var AuthorizationInterface $authorizationConfiguration */
    protected AuthorizationInterface $authorizationConfiguration;

    /** @var BoxService $boxService */
    protected BoxService $boxService;

    /**
     * BoxApiSdkBaseTest constructor.
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     * @throws GuzzleException
     * @throws BoxAuthorizationException
     */
    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->faker = Factory::create();

        $dotenv = new Dotenv();
        //TODO: This is silly. There must be a way to define this in phpunit.xml
        $dotenv->load(__DIR__ . '/../../.env.dev');

        $clientId = $_ENV['BoxClientId'];
        $clientSecret = $_ENV['BoxClientSecret'];
        $publicKeyId = $_ENV['BoxPublicKeyId'];
        $privateKey = $_ENV['BoxPrivateKey'];
        $passphrase = $_ENV['BoxPassphrase'];
        $enterpriseId = $_ENV['BoxEnterpriseId'];



        $serverAuthorization = new ServerAuthorization(
            clientId: $clientId,
            clientSecret: $clientSecret,
            publicKeyId: $publicKeyId,
            privateKey: $privateKey,
            passphrase: $passphrase,
            enterpriseID: $enterpriseId
        );

        $this->setAuthorizationConfiguration($serverAuthorization);
        $this->setBoxService(new BoxService($serverAuthorization));
    }


    public function createFolder(): Folder
    {
        $folderBody = [
            'name' => $this->faker->name,
            'parent' => [
                'id' => 0
            ]
        ];

        $request = new CreateFolderRequest($folderBody);
        $folderResource = $this->getBoxService()->folders()->createFolder($request);
        static::assertInstanceOf(Folder::class, $folderResource);
        return $folderResource;
    }

    public function deleteFolder($id)
    {
        $request = new DeleteFolderRequest(id: $id);
        $noContentResource = $this->getBoxService()->folders()->deleteFolder($request);
        static::assertInstanceOf(NoContent::class, $noContentResource);
    }


    public function createCollaboration(Folder $folderResource): Collaboration
    {
        $body = [
            'accessible_by' => [
                'type' => 'user',
                'login' => $_ENV['PersonalEmail']
            ],
            'item' => [
                'id' => $folderResource->getId(),
                'type' => 'folder'
            ],
            'role' => 'viewer'
        ];

        $request = new CreateCollaborationRequest(body: $body);
        $collaborationResource = $this->getBoxService()->collaborations()->createCollaboration($request);
        static::assertInstanceOf(Collaboration::class, $collaborationResource);
        return $collaborationResource;
    }

    public function createGroup(): Group
    {
        $body = [
            'name' => $this->faker->name
        ];

        $request = new CreateGroupRequest(body: $body);
        $groupResource = $this->getBoxService()->groups()->createGroup($request);
        static::assertInstanceOf(Group::class, $groupResource);
        return $groupResource;
    }

    protected function removeGroup(int $id)
    {
        //Clean Up
        $deleteRequest = new RemoveGroupRequest($id);
        $noContentResource = $this->getBoxService()->groups()->removeGroup($deleteRequest);
        static::assertInstanceOf(NoContent::class, $noContentResource);
    }

    /**
     * @return File
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function uploadFile(): File
    {
        $name = $this->faker->firstName;
        $path = "tests/TestingData/TestingFile.txt";
        $dateTimeString = Carbon::now()->toRfc3339String();
        $body = [
            'attributes' => [
                'content_created_at' => $dateTimeString,
                'content_modified_at' => $dateTimeString,
                'name' => $name,
                'parent' => [
                    'id' => 0
                ]
            ],
            'file' => [
                'name' => 'file',
                'contents' => file_get_contents($path),
                'filename' => $name
            ]
        ];

        $request = new UploadFileRequest(body: $body);
        $filesResource = $this->getBoxService()->files()->uploadFile($request);
        static::assertInstanceOf(Files::class, $filesResource);
        static::assertIsArray($filesResource->getEntries());
        static::assertIsInt($filesResource->getTotalCount());
        $entriesArray = $filesResource->getEntries();
        return $entriesArray[0];
    }


    /**
     * @param int $id
     * @return NoContent
     * @throws BoxAuthorizationException
     * @throws BoxBadRequestException
     * @throws BoxForbiddenException
     * @throws BoxNotFoundException
     * @throws ClientExceptionInterface
     */
    public function deleteFile(int $id): NoContent
    {
        $request = new DeleteFileRequest($id);
        $noContentResource = $this->getBoxService()->files()->deleteFile($request);
        static::assertInstanceOf(NoContent::class, $noContentResource);
        return $noContentResource;
    }



    /**
     * @return AuthorizationInterface
     */
    public function getAuthorizationConfiguration(): AuthorizationInterface
    {
        return $this->authorizationConfiguration;
    }

    /**
     * @param AuthorizationInterface $authorizationConfiguration
     * @return BaseTest
     */
    public function setAuthorizationConfiguration(AuthorizationInterface $authorizationConfiguration): BaseTest
    {
        $this->authorizationConfiguration = $authorizationConfiguration;
        return $this;
    }

    /**
     * @return BoxService
     */
    public function getBoxService(): BoxService
    {
        return $this->boxService;
    }

    /**
     * @param BoxService $boxService
     * @return BaseTest
     */
    public function setBoxService(BoxService $boxService): BaseTest
    {
        $this->boxService = $boxService;
        return $this;
    }

}
