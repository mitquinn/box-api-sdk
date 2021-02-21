<?php


namespace Mitquinn\BoxApiSdk;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Mitquinn\BoxApiSdk\Api\Classifications;
use Mitquinn\BoxApiSdk\Api\Collaborations;
use Mitquinn\BoxApiSdk\Api\Collections;
use Mitquinn\BoxApiSdk\Api\Comments;
use Mitquinn\BoxApiSdk\Api\Events;
use Mitquinn\BoxApiSdk\Api\Files;
use Mitquinn\BoxApiSdk\Api\FolderLocks;
use Mitquinn\BoxApiSdk\Api\Folders;
use Mitquinn\BoxApiSdk\Api\GroupMemberships;
use Mitquinn\BoxApiSdk\Api\Groups;
use Mitquinn\BoxApiSdk\Api\Users;
use Mitquinn\BoxApiSdk\Api\WebLinks;
use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Interfaces\AuthorizationInterface;
use Psr\Http\Client\ClientInterface;

/**
 * Class BoxClient
 * @package Mitquinn\BoxApiSdk
 */
class BoxService
{

    /** @var Files $filesApi */
    protected Files $filesApi;

    /** @var Folders $foldersApi */
    protected Folders $foldersApi;

    /** @var Users $usersApi */
    protected Users $usersApi;

    /** @var Collaborations $collaborationsApi */
    protected Collaborations $collaborationsApi;

    /** @var Groups $groupsApi */
    protected Groups $groupsApi;

    /** @var GroupMemberships $groupMembershipsApi */
    protected GroupMemberships $groupMembershipsApi;

    /** @var Classifications $classificationsApi */
    protected Classifications $classificationsApi;

    /** @var Collections $collectionsApi */
    protected Collections $collectionsApi;

    /** @var Comments $commentsApi */
    protected Comments $commentsApi;

    /** @var Events $eventsApi */
    protected Events $eventsApi;

    /** @var FolderLocks $folderLocksApi */
    protected FolderLocks $folderLocksApi;

    /** @var WebLinks $webLinks */
    protected WebLinks $webLinks;

    /** @var AuthorizationInterface $authorizationConfiguration */
    protected AuthorizationInterface $authorizationConfiguration;



    /** @var ClientInterface $client */
    protected ClientInterface $client;

    /** @var string $accessToken */
    protected string $accessToken;

    /**
     * BoxClient constructor.
     * @param AuthorizationInterface $authorizationConfiguration
     * @param ClientInterface|null $client
     * @throws BoxAuthorizationException
     * @throws GuzzleException
     */
    public function __construct(AuthorizationInterface $authorizationConfiguration, ClientInterface $client = null)
    {
        $this->setAuthorizationConfiguration($authorizationConfiguration);
        if (is_null($client)) {
            $accessToken = $this->generateAccessToken();
            $client = new Client([
                'headers' => [
                    'Authorization' => "Bearer $accessToken"
                ]
            ]);
        }
        $this->setClient($client);
        //Todo: I think this should move to the setClient function?
        $this->initializeCollectionAccessors();
    }


    /**
     * @param Client|null $client
     * @return string
     * @throws BoxAuthorizationException
     * @throws GuzzleException
     */
    public function generateAccessToken(Client $client = null): string
    {
        if (is_null($client)) {
            $client = new Client();
        }

        try {
            $authConfiguration = $this->getAuthorizationConfiguration();
            $request = $authConfiguration->getAuthorizationRequest();
            $response = $client->send($request);

            if ($response->getStatusCode() !== 200) {
                throw new BoxAuthorizationException(response: $response);
            }

            $responseBody = json_decode($response->getBody()->getContents(), true);
            $accessToken = $responseBody['access_token'];
            $this->setAccessToken($accessToken);
            return $accessToken;

        } catch (Exception $exception) {
            throw new BoxAuthorizationException(previous: $exception);
        }
    }


    /*** Start Collection Accessors ***/
    protected function initializeCollectionAccessors(): void
    {
        $this->usersApi = new Users($this->getClient());
        $this->foldersApi = new Folders($this->getClient());
        $this->filesApi = new Files($this->getClient());
        $this->collaborationsApi = new Collaborations($this->getClient());
        $this->groupsApi = new Groups($this->getClient());
        $this->groupMembershipsApi = new GroupMemberships($this->getClient());
        $this->classificationsApi = new Classifications($this->getClient());
        $this->collectionsApi = new Collections($this->getClient());
        $this->commentsApi = new Comments($this->getClient());
        $this->eventsApi = new Events($this->getClient());
        $this->folderLocksApi = new FolderLocks($this->getClient());
        $this->webLinks = new WebLinks($this->getClient());
    }

    public function webLinks(): WebLinks
    {
        return $this->webLinks;
    }

    public function folderLocks(): FolderLocks
    {
        return $this->folderLocksApi;
    }

    /**
     * @return Events
     */
    public function events(): Events
    {
        return $this->eventsApi;
    }

    /**
     * @return Comments
     */
    public function comments(): Comments
    {
        return $this->commentsApi;
    }

    /**
     * @return Collections
     */
    public function collections(): Collections
    {
        return $this->collectionsApi;
    }

    /**
     * @return Classifications
     */
    public function classifications(): Classifications
    {
        return $this->classificationsApi;
    }

    /**
     * @return GroupMemberships
     */
    public function groupMemberships(): GroupMemberships
    {
        return $this->groupMembershipsApi;
    }

    /**
     * @return Groups
     */
    public function groups(): Groups
    {
        return $this->groupsApi;
    }

    /**
     * @return Collaborations
     */
    public function collaborations(): Collaborations
    {
        return $this->collaborationsApi;
    }

    /**
     * @return Users
     */
    public function users(): Users
    {
        return $this->usersApi;
    }

    /**
     * @return Folders
     */
    public function folders(): Folders
    {
        return $this->foldersApi;
    }

    /**
     * @return Files
     */
    public function files(): Files
    {
        return $this->filesApi;
    }

    /*** End Collection Accessors ***/


    /*** Start Getters and Setters ***/

    /**
     * @return AuthorizationInterface
     */
    public function getAuthorizationConfiguration(): AuthorizationInterface
    {
        return $this->authorizationConfiguration;
    }

    /**
     * @param AuthorizationInterface $authorizationConfiguration
     * @return BoxService
     */
    public function setAuthorizationConfiguration(AuthorizationInterface $authorizationConfiguration): BoxService
    {
        $this->authorizationConfiguration = $authorizationConfiguration;
        return $this;
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
     * @return BoxService
     */
    public function setClient(ClientInterface $client): BoxService
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $accessToken
     * @return BoxService
     */
    public function setAccessToken(string $accessToken): BoxService
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /*** End Getters and Setters ***/

}