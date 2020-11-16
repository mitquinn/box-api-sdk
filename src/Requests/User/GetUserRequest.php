<?php


namespace Mitquinn\BoxApiSdk\Requests\User;

use GuzzleHttp\Psr7\Request;
use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Psr\Http\Message\RequestInterface;

/**
 * Class UserRequest
 * @package Mitquinn\BoxApiSdk\Requests
 */
class GetUserRequest extends BaseRequest
{

    protected int $user_id;

    protected array $query;

    protected string $method = 'GET';


    /**
     * UserRequest constructor.
     * @param int $user_id
     * @param array $query
     */
    public function __construct(int $user_id, array $query = [])
    {
        $this->setUserId($user_id);
        $this->setQuery($query);
    }

    public function getUri(): string
    {
        return $this->getBaseUri().$this->getVersion().'/user/'.$this->getUserId();
    }

    public function generateRequestInterface(): RequestInterface
    {
        $request = new Request(
            $this->getMethod(),
            $this->getUri(),
        );
    }




    /*** Start Getters and Setters ***/

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return GetUserRequest
     */
    public function setUserId(int $user_id): GetUserRequest
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->query;
    }

    /**
     * @param array $query
     * @return GetUserRequest
     */
    public function setQuery(array $query): GetUserRequest
    {
        $this->query = $query;
        return $this;
    }


    /*** End Getters and Setters ***/

}