<?php
declare(strict_types=1);
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\AdminAuthConfig\Services;

use BasicApp\AdminAuthConfig\Config\AdminCredential as AdminCredentialConfig;
use BasicApp\AdminAuth\Config\AdminAuth as AdminAuthConfig;
use BasicApp\AdminAuth\Interfaces\AdminInterface;

class AdminAuth implements AdminInterface
{
    protected AdminAuthConfig $authConfig;

    protected AdminCredentialConfig $credentialConfig;

    public function __construct(AdminAuthConfig $authConfig)
    {
        $this->authConfig = $authConfig;

        $this->credentialConfig = config(AdminCredentialConfig::class);
    }

    public function getAdminName(): ?string
    {
        return $this->credentialConfig->login;
    }

    public function getAdminEmail(): ?string
    {
        return $this->credentialConfig->email;
    }

    public function getAdminAvatarImageUrl(?string $default = null): ?string
    {
        if ($this->credentialConfig->avatarImage)
        {
            return base_url($this->credentialConfig->avatarImage);
        }

        return $default ? base_url($default) : null;
    }

    public function getAdminLogoutUrl(): ?string
    {
        return site_url('admin/logout');
    }

    public function getAdminAccountMenu(): array
    {
        return [];
    }
}
