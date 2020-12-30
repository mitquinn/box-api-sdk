<?php

namespace Mitquinn\BoxApiSdk\Interfaces;


use GuzzleHttp\Psr7\Request;

/**
 * Class BoxConfiguration
 * @package Mitquinn\BoxApiSdk
 */
interface AuthorizationInterface
{
//    /**
//     * @return string
//     */
//    public function getClientId(): string;
//
//    /**
//     * @return string
//     */
//    public function getClientSecret(): string;
//
//    /**
//     * @return string
//     */
//    public function getPublicKeyId(): string;
//
//    /**
//     * @return string
//     */
//    public function getPrivateKey(): string;
//
//    /**
//     * @return string
//     */
//    public function getPassphrase(): string;
//
//    /**
//     * @return int
//     */
//    public function getEnterpriseId(): int;


    public function getAuthorizationRequest(): Request;




}