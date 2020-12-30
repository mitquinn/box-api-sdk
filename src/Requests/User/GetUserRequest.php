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
    /** @var int $id */
    protected int $id;

    /** @var string $method */
    protected string $method = 'GET';

    /**
     * UserRequest constructor.
     * @param int $id
     * @param array $query
     */
    public function __construct(int $id, array $query = [])
    {
        parent::__construct(query: $query);
        $this->setId($id);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'users/'.$this->getId();
        return $this->generateUri($requestSegment);
    }


    /*** Start Getters and Setters ***/

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return GetUserRequest
     */
    public function setId(int $id): GetUserRequest
    {
        $this->id = $id;
        return $this;
    }

    /*** End Getters and Setters ***/

}