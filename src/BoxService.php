<?php


namespace Mitquinn\BoxApiSdk;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Mitquinn\BoxApiSdk\Apis\ClassificationsApi;
use Mitquinn\BoxApiSdk\Apis\CollaborationsApi;
use Mitquinn\BoxApiSdk\Apis\CollectionsApi;
use Mitquinn\BoxApiSdk\Apis\CommentsApi;
use Mitquinn\BoxApiSdk\Apis\EventsApi;
use Mitquinn\BoxApiSdk\Apis\FilesApi;
use Mitquinn\BoxApiSdk\Apis\FoldersApi;
use Mitquinn\BoxApiSdk\Apis\GroupMembershipsApi;
use Mitquinn\BoxApiSdk\Apis\GroupsApi;
use Mitquinn\BoxApiSdk\Apis\UsersApi;
use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Interfaces\AuthorizationInterface;
use Psr\Http\Client\ClientInterface;

/**
 * Class BoxClient
 * @package Mitquinn\BoxApiSdk
 */
class BoxService
{

    /** @var FilesApi $filesApi */
    protected FilesApi $filesApi;

    /** @var FoldersApi $foldersApi */
    protected FoldersApi $foldersApi;

    /** @var UsersApi $usersApi */
    protected UsersApi $usersApi;

    /** @var CollaborationsApi $collaborationsApi */
    protected CollaborationsApi $collaborationsApi;

    /** @var GroupsApi $groupsApi */
    protected GroupsApi $groupsApi;

    /** @var GroupMembershipsApi $groupMembershipsApi */
    protected GroupMembershipsApi $groupMembershipsApi;

    /** @var ClassificationsApi $classificationsApi */
    protected ClassificationsApi $classificationsApi;

    /** @var CollectionsApi $collectionsApi */
    protected CollectionsApi $collectionsApi;

    /** @var CommentsApi $commentsApi */
    protected CommentsApi $commentsApi;

    /** @var EventsApi $eventsApi */
    protected EventsApi $eventsApi;

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
        $this->usersApi = new UsersApi($this->getClient());
        $this->foldersApi = new FoldersApi($this->getClient());
        $this->filesApi = new FilesApi($this->getClient());
        $this->collaborationsApi = new CollaborationsApi($this->getClient());
        $this->groupsApi = new GroupsApi($this->getClient());
        $this->groupMembershipsApi = new GroupMembershipsApi($this->getClient());
        $this->classificationsApi = new ClassificationsApi($this->getClient());
        $this->collectionsApi = new CollectionsApi($this->getClient());
        $this->commentsApi = new CommentsApi($this->getClient());
        $this->eventsApi = new EventsApi($this->getClient());
    }

    public function events(): EventsApi
    {
        return $this->eventsApi;
    }

    /**
     * @return CommentsApi
     */
    public function comments(): CommentsApi
    {
        return $this->commentsApi;
    }

    /**
     * @return CollectionsApi
     */
    public function collections(): CollectionsApi
    {
        return $this->collectionsApi;
    }

    /**
     * @return ClassificationsApi
     */
    public function classifications(): ClassificationsApi
    {
        return $this->classificationsApi;
    }

    /**
     * @return GroupMembershipsApi
     */
    public function groupMemberships(): GroupMembershipsApi
    {
        return $this->groupMembershipsApi;
    }

    /**
     * @return GroupsApi
     */
    public function groups(): GroupsApi
    {
        return $this->groupsApi;
    }

    /**
     * @return CollaborationsApi
     */
    public function collaborations(): CollaborationsApi
    {
        return $this->collaborationsApi;
    }

    /**
     * @return UsersApi
     */
    public function users(): UsersApi
    {
        return $this->usersApi;
    }

    /**
     * @return FoldersApi
     */
    public function folders(): FoldersApi
    {
        return $this->foldersApi;
    }

    /**
     * @return FilesApi
     */
    public function files(): FilesApi
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