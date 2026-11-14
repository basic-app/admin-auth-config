<?php
declare(strict_types=1);
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\AdminAuthConfig\Config;

use CodeIgniter\Config\BaseConfig;

class AdminCredential extends BaseConfig
{
    public $login;

    public $password;

    public $email;

    public $avatarImage;
}
