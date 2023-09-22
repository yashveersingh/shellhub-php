# ShellHub Helper For Laravel
[![Latest Version on Packagist](https://img.shields.io/packagist/v/yashveersingh/shellhub-php.svg?style=flat-square)](https://packagist.org/packages/yashveersingh/shellhub-php)

[![Total Downloads](https://img.shields.io/packagist/dt/yashveersingh/shellhub-php.svg?style=flat-square)](https://packagist.org/packages/yashveersingh/shellhub-php)
## What It Does
This package allows you to sync devices from [Shellhub](https://www.shellhub.io) and save it in database.

Installation:
``` bash
composer require yashveersingh/shellhub-php
```

After installing package run:
``` bash
php artisan shellhub:install
```
This will generate `shellhub.php` file in `config` directory.
``` PHP
<?php
return [
    'url' => env('shell_hub_url', ''),
    'username' => env('shell_hub_username', ''),
    'password' => env('shell_hub_password', ''),
];
```
You need to override `url` `username` `password`

**Note**:  You need to have cron setup every minute.
``` bash
php artisan schedule:run
```
#### or 
Manually run these command in order to fetch api key and devices
``` bash
php artisan shellhub:refresh_api_key
php artisan shellhub:sync
```


If u need to sync immediately, You can run this command manually.

### Testing

``` bash
composer test
```

### Security

If you discover any security-related issues, please email [yashveersingh444444@gmail.com](mailto:yashveersingh444444@gmail.com) instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.