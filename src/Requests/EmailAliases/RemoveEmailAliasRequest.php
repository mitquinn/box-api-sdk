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

    /** @var int $emailAliasId */
    protected int $emailAliasId;

    /** @var string $method */
    protected string $method = 'DELETE';

    /**
     * RemoveEmailAliasRequest constructor.
     * @param int $userId
     * @param int $emailAliasId
     */
    public function __construct(int $userId, int $emailAliasId)
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
     * @return int
     */
    public function getEmailAliasId(): int
    {
        return $this->emailAliasId;
    }

    /**
     * @param int $emailAliasId
     * @return RemoveEmailAliasRequest
     */
    public function setEmailAliasId(int $emailAliasId): RemoveEmailAliasRequest
    {
        $this->emailAliasId = $emailAliasId;
        return $this;
    }

    /*** End Getters and Setters ***/
}