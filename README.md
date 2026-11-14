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

3. Add to ".env"

```
AdminAuth.credentialClass="BasicApp\AdminAuthConfig\Services\AdminAuth"
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
AdminCredential.login="admin"
AdminCredential.password="admin"
AdminCredential.email="email@example.org"
AdminCredential.avatarImage="assets/adminlte4/assets/img/avatar5.png"
```

Access backend by opening `http://localhost:8080/index.php/admin` in a browser.
```
login: admin
password: admin
```

You need to restart the Spark server so the new settings take effect.