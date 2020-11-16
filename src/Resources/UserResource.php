<?php

namespace Mitquinn\BoxApiSdk\Resources;

use DateTime;
use Psr\Http\Message\ResponseInterface;

/**
 * Class UserResource
 * @package Mitquinn\BoxApiSdk\Resources
 */
class UserResource
{

    /** @var int $user_id */
    protected int $user_id;

    /** @var string $type */
    protected string $type = 'user';

    /** @var string $address */
    protected string $address;

    /** @var string $avatar_url */
    protected string $avatar_url;

    /** @var bool $can_see_managed_users */
    protected bool $can_see_managed_users;

    /** @var DateTime $created_at */
    protected DateTime $created_at;

    /** @var array|string[] $enterprise */
    protected array $enterprise = [
        'id' => '',
        'enterprise' => 'enterprise',
        'name' => ''
    ];

    /** @var string $external_app_user_id */
    protected string $external_app_user_id;

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

    /** @var DateTime $modified_at */
    protected DateTime $modified_at;

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
     * UserResource constructor.
     * @param ResponseInterface $userResponse
     */
    public function __construct(ResponseInterface $userResponse)
    {
        $this->mapResponse($userResponse);
    }

    public function mapResponse(ResponseInterface $response): UserResource
    {
        $body = json_decode($response->getBody()->getContents(), true);

        if (isset($body['user_id'])) {
            $this->setUserId($body['user_id']);
        }

        return $this;
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
     * @return UserResource
     */
    public function setUserId(int $user_id): UserResource
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return UserResource
     */
    public function setType(string $type): UserResource
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return UserResource
     */
    public function setAddress(string $address): UserResource
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
     * @return UserResource
     */
    public function setAvatarUrl(string $avatar_url): UserResource
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
     * @return UserResource
     */
    public function setCanSeeManagedUsers(bool $can_see_managed_users): UserResource
    {
        $this->can_see_managed_users = $can_see_managed_users;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @param DateTime $created_at
     * @return UserResource
     */
    public function setCreatedAt(DateTime $created_at): UserResource
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getEnterprise()
    {
        return $this->enterprise;
    }

    /**
     * @param array|string[] $enterprise
     * @return UserResource
     */
    public function setEnterprise($enterprise)
    {
        $this->enterprise = $enterprise;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalAppUserId(): string
    {
        return $this->external_app_user_id;
    }

    /**
     * @param string $external_app_user_id
     * @return UserResource
     */
    public function setExternalAppUserId(string $external_app_user_id): UserResource
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
     * @return UserResource
     */
    public function setHostname(string $hostname): UserResource
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
     * @return UserResource
     */
    public function setIsExemptFromDeviceLimits(bool $is_exempt_from_device_limits): UserResource
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
     * @return UserResource
     */
    public function setIsExemptFromLoginVerification(bool $is_exempt_from_login_verification): UserResource
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
     * @return UserResource
     */
    public function setIsExternalCollabRestricted(bool $is_external_collab_restricted): UserResource
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
     * @return UserResource
     */
    public function setIsPlatformAccessOnly(bool $is_platform_access_only): UserResource
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
     * @return UserResource
     */
    public function setIsSyncEnabled(bool $is_sync_enabled): UserResource
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
     * @return UserResource
     */
    public function setJobTitle(string $job_title): UserResource
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
     * @return UserResource
     */
    public function setLanguage(string $language): UserResource
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
     * @return UserResource
     */
    public function setLogin(string $login): UserResource
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
     * @return UserResource
     */
    public function setMaxUploadSize(int $max_upload_size): UserResource
    {
        $this->max_upload_size = $max_upload_size;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModifiedAt(): DateTime
    {
        return $this->modified_at;
    }

    /**
     * @param DateTime $modified_at
     * @return UserResource
     */
    public function setModifiedAt(DateTime $modified_at): UserResource
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
     * @return UserResource
     */
    public function setMyTags(array $my_tags): UserResource
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
     * @return UserResource
     */
    public function setName(string $name): UserResource
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
     * @return UserResource
     */
    public function setNotificationEmail(array $notification_email): UserResource
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
     * @return UserResource
     */
    public function setPhone(string $phone): UserResource
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
     * @return UserResource
     */
    public function setRole(string $role): UserResource
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
     * @return UserResource
     */
    public function setSpaceAmount(int $space_amount): UserResource
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
     * @return UserResource
     */
    public function setSpaceUsed(int $space_used): UserResource
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
     * @return UserResource
     */
    public function setStatus(string $status): UserResource
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
     * @return UserResource
     */
    public function setTimezone(string $timezone): UserResource
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
     * @return UserResource
     */
    public function setTrackingCodes(array $tracking_codes): UserResource
    {
        $this->tracking_codes = $tracking_codes;
        return $this;
    }


    /*** End Getters and Setters ***/

}