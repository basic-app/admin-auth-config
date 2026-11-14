<?php
declare(strict_types=1);
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\AdminAuthConfig\Rules;

use BasicApp\AdminAuthConfig\Config\AdminCredential as AdminConfig;

class AdminAuthConfigRules
{
    public function admin_auth_config_login(
        $value,
        string $param,
        array $data,
        &$error = null,
        &$field = null) : bool {

        $config = config(AdminConfig::class);

        if ($value != $config->login)
        {
            $error = lang('Admin.Invalid login or password.');

            return false;
        }

        return true;
    }

    public function admin_auth_config_password(
        $value,
        string $param,
        array $data,
        &$error = null,
        &$field = null) : bool {
        
        $config = config(AdminConfig::class);

        if ($value != $config->password)
        {
            $error = lang('Admin.Invalid login or password.');

            $field = 'login';

            return false;
        }

        return true;
    }
}