# Basic App

##Admin Auth Config

### Install

1. Run

```
composer require basic-app/admin-auth-config

```
2. Add to "Config/Routes.php"

```
helper(['admin_auth_config']);

admin_auth_config_routes($routes);
```

3. Add to "Config/Services.php"

```
    public static function adminAuth($getShared = true)
    {
        if ($getShared) 
        {
            return static::getSharedInstance(__FUNCTION__);
        }

        return config(\BasicApp\AdminAuthConfig\Config\AdminAuth::class);
    }
```

4. Add to "Config/Filters.php"

```
    public array $aliases = [
        /* other aliases */
        'admin'         => \BasicApp\AdminAuthConfig\Filters\AdminFilter::class
    ];
    
    public array $filters = [
        /* other filters */
        'admin' => [
            'before' => ['admin', 'admin/*']
        ]
    ];

```

5. Add settings to .env

```
AdminAuth.login="admin"
AdminAuth.password="admin"
AdminAuth.email="email@example.org"
AdminAuth.avatar_image="assets/adminlte4/assets/img/avatar5.png"
```