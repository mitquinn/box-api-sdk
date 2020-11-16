<?php

namespace Mitquinn\BoxApiSdk\Interfaces;


/**
 * Class BoxConfiguration
 * @package Mitquinn\BoxApiSdk
 */
interface BoxConfigurationInterface
{
    /**
     * @return string
     */
    public function getClientId(): string;

    /**
     * @return string
     */
    public function getClientSecret(): string;

    /**
     * @return string
     */
    public function getPublicKeyId(): string;

    /**
     * @return string
     */
    public function getPrivateKey(): string;

    /**
     * @return string
     */
    public function getPassphrase(): string;

    /**
     * @return int
     */
    public function getEnterpriseId(): int;
}