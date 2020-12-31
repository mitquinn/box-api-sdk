<?php

namespace Mitquinn\BoxApiSdk\Requests\Users;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class GetUserRequest
 * @package Mitquinn\BoxApiSdk\Requests\Users
 */
class GetUserRequest extends BaseRequest
{
    use HasId;

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
        $this->setId(id: $id);
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $requestSegment = 'users/'.$this->getId();
        return $this->generateUri(requestSegment: $requestSegment);
    }


    /*** Start Getters and Setters ***/



    /*** End Getters and Setters ***/

}