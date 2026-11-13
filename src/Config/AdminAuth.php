<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\AdminAuthConfig\Config;

use CodeIgniter\Config\BaseConfig;
use BasicApp\AdminAuth\Interfaces\AdminInterface;

class AdminAuth extends BaseConfig implements AdminInterface
{
    public $login;

    public $password;

    public $email;

    public $avatar_image;

    public function getAdminName() : ?string
    {
        return $this->login;
    }

    public function getAdminEmail() : ?string
    {
        return $this->email;
    }

    public function getAdminAvatarImageUrl(?string $default = null) : ?string
    {
        if ($this->avatar_image)
        {
            return base_url($this->avatar_image);
        }

        return $default ? base_url($default) : null;
    }

    public function getAdminLogoutUrl() : ?string
    {
        return site_url('admin/logout');
    }

    public function getAdminAccountMenu() : array
    {
        return [];
    }
}
