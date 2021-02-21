<?php

namespace Mitquinn\BoxApiSdk\Resources;

use DateTime;
use Mitquinn\BoxApiSdk\Traits\Properties\HasId;
use Mitquinn\BoxApiSdk\Traits\Properties\HasType;
use Psr\Http\Message\ResponseInterface;

/**
 * Class UserResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class User extends Resource
{
    use HasId, HasType;

    /** @var string $address */
    protected string $address;

    /** @var string $avatar_url */
    protected string $avatar_url;

    /** @var bool $can_see_managed_users */
    protected bool $can_see_managed_users;

    /** @var DateTime|string $created_at */
    protected DateTime|string $created_at;

    /** @var array|string[] $enterprise */
    protected array $enterprise = [
        'id' => '',
        'enterprise' => 'enterprise',
        'name' => ''
    ];

    /** @var string|null $external_app_user_id */
    protected null|string $external_app_user_id = null;

    /** @var string $hostname */
    protected string $hostname;

    /** @var bool $is_exempt_from_device_limits */
    protected bool $is_exempt_from_device_limits;

    /** @var bool $is_exempt_from_login_verification */
    protected bool $is_exempt_from_login_verification;

    /** @var bool $is_external_collab_restricted */
    protected bool $is_external_collab_restricted;

    /** @var bool $is_platform_access_only */
    protected bool $is_platform_access_only;

    /** @var bool $is_sync_enabled */
    protected bool $is_sync_enabled;

    /** @var string $job_title */
    protected string $job_title;

    /** @var string $language */
    protected string $language;

    /** @var string $login */
    protected string $login;

    /** @var int $max_upload_size */
    protected int $max_upload_size;

    /** @var DateTime|string $modified_at */
    protected DateTime|string $modified_at;

    /** @var array $my_tags */
    protected array $my_tags;

    /** @var string $name */
    protected string $name;

    /** @var array $notification_email */
    protected array $notification_email = [
        'email' => '',
        'is_confirmed' => false
    ];

    /** @var string $phone */
    protected string $phone;

    /** @var string $role */
    protected string $role;

    /** @var int $space_amount */
    protected int $space_amount;

    /** @var int $space_used */
    protected int $space_used;

    /** @var string $status */
    protected string $status;

    /** @var string $timezone */
    protected string $timezone;

    /** @var array $tracking_codes */
    protected array $tracking_codes;


    /**
     * @param array $response
     * @return $this
     */
    protected function mapResource(array $response): static
    {
        if (array_key_exists('id', $response)) {
            /** @info There are situations where the id of a user is "". (Example: Trash or Root Folder) In these situations we will set the value to null. */
            if ($response['id'] === "") {
                $this->setId(id: null);
            } else {
                $this->setId($response['id']);
            }
        }

        if (array_key_exists('type', $response)) {
            $this->setType($response['type']);
        }

        if (array_key_exists('address', $response)) {
            $this->setAddress($response['address']);
        }

        if (array_key_exists('avatar_url', $response)) {
            $this->setAvatarUrl($response['avatar_url']);
        }

        if (array_key_exists('can_see_managed_users', $response)) {
            $this->setCanSeeManagedUsers($response['can_see_managed_users']);
        }

        if (array_key_exists('created_at', $response)) {
            $this->setCreatedAt($response['created_at']);
        }

        if (array_key_exists('enterprise', $response)) {
            $this->setEnterprise($response['enterprise']);
        }

        if (array_key_exists('external_app_user_id', $response)) {
            $this->setExternalAppUserId($response['external_app_user_id']);
        }

        if (array_key_exists('hostname', $response)) {
            $this->setHostname($response['hostname']);
        }

        if (array_key_exists('is_exempt_from_device_limits', $response)) {
            $this->setIsExemptFromDeviceLimits($response['is_exempt_from_device_limits']);
        }

        if (array_key_exists('is_exempt_from_login_verification', $response)) {
            $this->setIsExemptFromLoginVerification($response['is_exempt_from_login_verification']);
        }

        if (array_key_exists('is_external_collab_restricted', $response)) {
            $this->setIsExternalCollabRestricted($response['is_external_collab_restricted']);
        }

        if (array_key_exists('is_platform_access_only', $response)) {
            $this->setIsPlatformAccessOnly($response['is_platform_access_only']);
        }

        if (array_key_exists('is_sync_enabled', $response)) {
            $this->setIsSyncEnabled($response['is_sync_enabled']);
        }

        if (array_key_exists('job_title', $response)) {
            $this->setJobTitle($response['job_title']);
        }

        if (array_key_exists('language', $response)) {
            $this->setLanguage($response['language']);
        }

        if (array_key_exists('login', $response)) {
            $this->setLogin($response['login']);
        }

        if (array_key_exists('max_upload_size', $response)) {
            $this->setMaxUploadSize($response['max_upload_size']);
        }

        if (array_key_exists('max_upload_size', $response)) {
            $this->setMaxUploadSize($response['max_upload_size']);
        }

        if (array_key_exists('modified_at', $response)) {
            $this->setModifiedAt($response['modified_at']);
        }

        // Todo: Check this one it may explode because of a "string array" type?
        if (array_key_exists('my_tags', $response)) {
            $this->setMyTags($response['my_tags']);
        }

        if (array_key_exists('name', $response)) {
            $this->setName($response['name']);
        }

        if (array_key_exists('notification_email', $response)) {
            $this->setNotificationEmail($response['notification_email']);
        }

        if (array_key_exists('phone', $response)) {
            $this->setPhone($response['phone']);
        }

        if (array_key_exists('role', $response)) {
            $this->setRole($response['role']);
        }

        if (array_key_exists('space_amount', $response)) {
            $this->setSpaceAmount($response['space_amount']);
        }

        if (array_key_exists('space_used', $response)) {
            $this->setSpaceUsed($response['space_used']);
        }

        if (array_key_exists('status', $response)) {
            $this->setStatus($response['status']);
        }

        if (array_key_exists('timezone', $response)) {
            $this->setTimezone($response['timezone']);
        }

        if (array_key_exists('tracking_codes', $response)) {
            $this->setTrackingCodes($response['tracking_codes']);
        }

        return $this;
    }


    /*** Start Getters and Setters ***/

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return User
     */
    public function setAddress(string $address): User
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return $this->avatar_url;
    }

    /**
     * @param string $avatar_url
     * @return User
     */
    public function setAvatarUrl(string $avatar_url): User
    {
        $this->avatar_url = $avatar_url;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCanSeeManagedUsers(): bool
    {
        return $this->can_see_managed_users;
    }

    /**
     * @param bool $can_see_managed_users
     * @return User
     */
    public function setCanSeeManagedUsers(bool $can_see_managed_users): User
    {
        $this->can_see_managed_users = $can_see_managed_users;
        return $this;
    }

    /**
     * @return DateTime|string
     */
    public function getCreatedAt(): DateTime|string
    {
        return $this->created_at;
    }

    /**
     * @param DateTime|string $created_at
     * @return User
     */
    public function setCreatedAt(DateTime|string $created_at): User
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return array
     */
    public function getEnterprise(): array
    {
        return $this->enterprise;
    }

    /**
     * @param array $enterprise
     * @return User
     */
    public function setEnterprise(array $enterprise): User
    {
        $this->enterprise = $enterprise;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getExternalAppUserId(): null|string
    {
        return $this->external_app_user_id;
    }

    /**
     * @param string|null $external_app_user_id
     * @return User
     */
    public function setExternalAppUserId(null|string $external_app_user_id): User
    {
        $this->external_app_user_id = $external_app_user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname
     * @return User
     */
    public function setHostname(string $hostname): User
    {
        $this->hostname = $hostname;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsExemptFromDeviceLimits(): bool
    {
        return $this->is_exempt_from_device_limits;
    }

    /**
     * @param bool $is_exempt_from_device_limits
     * @return User
     */
    public function setIsExemptFromDeviceLimits(bool $is_exempt_from_device_limits): User
    {
        $this->is_exempt_from_device_limits = $is_exempt_from_device_limits;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsExemptFromLoginVerification(): bool
    {
        return $this->is_exempt_from_login_verification;
    }

    /**
     * @param bool $is_exempt_from_login_verification
     * @return User
     */
    public function setIsExemptFromLoginVerification(bool $is_exempt_from_login_verification): User
    {
        $this->is_exempt_from_login_verification = $is_exempt_from_login_verification;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsExternalCollabRestricted(): bool
    {
        return $this->is_external_collab_restricted;
    }

    /**
     * @param bool $is_external_collab_restricted
     * @return User
     */
    public function setIsExternalCollabRestricted(bool $is_external_collab_restricted): User
    {
        $this->is_external_collab_restricted = $is_external_collab_restricted;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsPlatformAccessOnly(): bool
    {
        return $this->is_platform_access_only;
    }

    /**
     * @param bool $is_platform_access_only
     * @return User
     */
    public function setIsPlatformAccessOnly(bool $is_platform_access_only): User
    {
        $this->is_platform_access_only = $is_platform_access_only;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsSyncEnabled(): bool
    {
        return $this->is_sync_enabled;
    }

    /**
     * @param bool $is_sync_enabled
     * @return User
     */
    public function setIsSyncEnabled(bool $is_sync_enabled): User
    {
        $this->is_sync_enabled = $is_sync_enabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->job_title;
    }

    /**
     * @param string $job_title
     * @return User
     */
    public function setJobTitle(string $job_title): User
    {
        $this->job_title = $job_title;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return User
     */
    public function setLanguage(string $language): User
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return User
     */
    public function setLogin(string $login): User
    {
        $this->login = $login;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxUploadSize(): int
    {
        return $this->max_upload_size;
    }

    /**
     * @param int $max_upload_size
     * @return User
     */
    public function setMaxUploadSize(int $max_upload_size): User
    {
        $this->max_upload_size = $max_upload_size;
        return $this;
    }

    /**
     * @return DateTime|string
     */
    public function getModifiedAt(): DateTime|string
    {
        return $this->modified_at;
    }

    /**
     * @param DateTime|string $modified_at
     * @return User
     */
    public function setModifiedAt(DateTime|string $modified_at): User
    {
        $this->modified_at = $modified_at;
        return $this;
    }

    /**
     * @return array
     */
    public function getMyTags(): array
    {
        return $this->my_tags;
    }

    /**
     * @param array $my_tags
     * @return User
     */
    public function setMyTags(array $my_tags): User
    {
        $this->my_tags = $my_tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName(string $name): User
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getNotificationEmail(): array
    {
        return $this->notification_email;
    }

    /**
     * @param array $notification_email
     * @return User
     */
    public function setNotificationEmail(array $notification_email): User
    {
        $this->notification_email = $notification_email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return User
     */
    public function setPhone(string $phone): User
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     * @return User
     */
    public function setRole(string $role): User
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpaceAmount(): int
    {
        return $this->space_amount;
    }

    /**
     * @param int $space_amount
     * @return User
     */
    public function setSpaceAmount(int $space_amount): User
    {
        $this->space_amount = $space_amount;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpaceUsed(): int
    {
        return $this->space_used;
    }

    /**
     * @param int $space_used
     * @return User
     */
    public function setSpaceUsed(int $space_used): User
    {
        $this->space_used = $space_used;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return User
     */
    public function setStatus(string $status): User
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     * @return User
     */
    public function setTimezone(string $timezone): User
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return array
     */
    public function getTrackingCodes(): array
    {
        return $this->tracking_codes;
    }

    /**
     * @param array $tracking_codes
     * @return User
     */
    public function setTrackingCodes(array $tracking_codes): User
    {
        $this->tracking_codes = $tracking_codes;
        return $this;
    }


    /*** End Getters and Setters ***/

}