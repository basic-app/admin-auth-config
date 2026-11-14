<?php
declare(strict_types=1);
/**
 * @author Basic App Dev Team
 * @license MIT
 */
use CodeIgniter\Router\RouteCollection;

if (!function_exists('admin_auth_config_routes'))
{
    function admin_auth_config_routes(RouteCollection $routes)
    {
        $routes->match(
            ['GET', 'POST'], 
            'admin/login', 
            '\BasicApp\AdminAuthConfig\Controllers\LoginController::index'
        );

        $routes->post(
            'admin/logout', 
            '\BasicApp\AdminAuthConfig\Controllers\LogoutController::index'
        );
    }
}
