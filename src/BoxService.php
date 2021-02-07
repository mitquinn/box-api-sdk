<?php


namespace Mitquinn\BoxApiSdk;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Mitquinn\BoxApiSdk\Collections\ClassificationsCollection;
use Mitquinn\BoxApiSdk\Collections\CollaborationsCollection;
use Mitquinn\BoxApiSdk\Collections\FilesCollection;
use Mitquinn\BoxApiSdk\Collections\FoldersCollection;
use Mitquinn\BoxApiSdk\Collections\GroupMembershipsCollection;
use Mitquinn\BoxApiSdk\Collections\GroupsCollection;
use Mitquinn\BoxApiSdk\Collections\UsersCollection;
use Mitquinn\BoxApiSdk\Exceptions\BoxAuthorizationException;
use Mitquinn\BoxApiSdk\Interfaces\AuthorizationInterface;
use Psr\Http\Client\ClientInterface;

/**
 * Class BoxClient
 * @package Mitquinn\BoxApiSdk
 */
class BoxService
{

    /** @var FilesCollection $filesCollection */
    protected FilesCollection $filesCollection;

    /** @var FoldersCollection $foldersCollection */
    protected FoldersCollection $foldersCollection;

    /** @var UsersCollection $usersCollection */
    protected UsersCollection $usersCollection;

    /** @var CollaborationsCollection $collaborationsCollection */
    protected CollaborationsCollection $collaborationsCollection;

    /** @var GroupsCollection $groupsCollection */
    protected GroupsCollection $groupsCollection;

    /** @var GroupMembershipsCollection $groupMembershipsCollection */
    protected GroupMembershipsCollection $groupMembershipsCollection;

    /** @var ClassificationsCollection $classificationsCollection */
    protected ClassificationsCollection $classificationsCollection;

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
        $this->usersCollection = new UsersCollection($this->getClient());
        $this->foldersCollection = new FoldersCollection($this->getClient());
        $this->filesCollection = new FilesCollection($this->getClient());
        $this->collaborationsCollection = new CollaborationsCollection($this->getClient());
        $this->groupsCollection = new GroupsCollection($this->getClient());
        $this->groupMembershipsCollection = new GroupMembershipsCollection($this->getClient());
        $this->classificationsCollection = new ClassificationsCollection($this->getClient());
    }

    /**
     * @return ClassificationsCollection
     */
    public function classifications(): ClassificationsCollection
    {
        return $this->classificationsCollection;
    }

    /**
     * @return GroupMembershipsCollection
     */
    public function groupMemberships(): GroupMembershipsCollection
    {
        return $this->groupMembershipsCollection;
    }

    /**
     * @return GroupsCollection
     */
    public function groups(): GroupsCollection
    {
        return $this->groupsCollection;
    }

    /**
     * @return CollaborationsCollection
     */
    public function collaborations(): CollaborationsCollection
    {
        return $this->collaborationsCollection;
    }

    /**
     * @return UsersCollection
     */
    public function users(): UsersCollection
    {
        return $this->usersCollection;
    }

    /**
     * @return FoldersCollection
     */
    public function folders(): FoldersCollection
    {
        return $this->foldersCollection;
    }

    /**
     * @return FilesCollection
     */
    public function files(): FilesCollection
    {
        return $this->filesCollection;
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