<?php

namespace Mitquinn\BoxApiSdk\Requests\EmailAliases;

use Mitquinn\BoxApiSdk\Requests\BaseRequest;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;

/**
 * Class RemoveEmailAliasRequest
 * @package Mitquinn\BoxApiSdk\Requests\EmailAliases
 */
class RemoveEmailAliasRequest extends BaseRequest
{
    use HasId;

    /** @var string $emailAliasId */
    protected string $emailAliasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * RemoveEmailAliasRequest constructor.
     * @param string $userId
     * @param string $emailAliasId
     */
    public function __construct(string $userId, string $emailAliasId)
    {
        $this->setId($userId);
        $this->setEmailAliasId($emailAliasId);
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        $requestSegment = 'users/'.$this->getId().'/email_aliases/'.$this->getEmailAliasId();
        return $this->generateUri($requestSegment);
    }

    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getEmailAliasId(): string
    {
        return $this->emailAliasId;
    }

    /**
     * @param string $emailAliasId
     * @return RemoveEmailAliasRequest
     */
    public function setEmailAliasId(string $emailAliasId): RemoveEmailAliasRequest
    {
        $this->emailAliasId = $emailAliasId;
        return $this;
    }

    /*** End Getters and Setters ***/
}