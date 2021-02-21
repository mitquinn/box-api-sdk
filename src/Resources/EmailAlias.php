<?php

namespace Mitquinn\BoxApiSdk\Resources;

use Adbar\Dot;
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
        $dot = new Dot($response);

        if ($dot->has('id')) {
            $this->setId($dot->get('id'));
        }

        if ($dot->has('type')) {
            $this->setType($dot->get('type'));
        }

        if ($dot->has('email')) {
            $this->setEmail($dot->get('email'));
        }

        if ($dot->has('is_confirmed')) {
            $this->setIsConfirmed($dot->get('is_confirmed'));
        }

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