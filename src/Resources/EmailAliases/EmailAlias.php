<?php

namespace Mitquinn\BoxApiSdk\Resources\EmailAliases;

use Illuminate\Support\Collection;
use Mitquinn\BoxApiSdk\Resources\Resource;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;

/**
 * Class EmailAliasResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class EmailAlias extends Resource
{
    use HasId, HasType;

    /** @var string $email */
    protected string $email;

    /** @var bool $is_confirmed */
    protected bool $is_confirmed;


    /**
     * @inheritDoc
     */
    protected function mapResource(array $response): static
    {
        $collection = new Collection($response);

        $this->setProperties($collection);

        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return EmailAlias
     */
    public function setEmail(string $email): EmailAlias
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsConfirmed(): bool
    {
        return $this->is_confirmed;
    }

    /**
     * @param bool $is_confirmed
     * @return EmailAlias
     */
    public function setIsConfirmed(bool $is_confirmed): EmailAlias
    {
        $this->is_confirmed = $is_confirmed;
        return $this;
    }


    /*** End Getters and Setters ***/
}