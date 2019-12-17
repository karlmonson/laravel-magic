# Laravel Magic

Laravel Magic is a passwordless authentication driver. Users receive a login link via email.

## Installation

Install via Composer:

```bash
composer require karlmonson/laravel-magic
```

The package service provider and facade will be automatically registered.

## Setup

After installation, run migrations:

```bash
php artisan migrate
```

This will create a new table ```magic_auth_requests``` in your database.

Next, replace the default ```AuthenticatesUsers``` trait on your ```LoginController``` with the following:

```php
use KarlMonson\Magic\Traits\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    ...
}
```

You'll also need to add the ```Magical``` trait to your user model:

```php
use KarlMonson\Magic\Traits\Magical;

class User extends Authenticatable
{
    use Magical, Notifiable;

    ...
}
```

We suggest dropping the ```password``` column from your user table, or at least making it ```nullable```.

## Configuration

Next, in your ```auth``` config file, replace the 'users' driver with 'magic':

```php
'providers' => [
    'users' => [
        'driver' => 'magic',
        'model' => App\User::class,
    ],
],
```

You may also specify an 'expire' option for Magic to use, this is how long login tokens will stay alive. The default is 10 if this is not specified.

```php
'magic' => [
    'expire' => 10,
]
```

## Credits

- [Karl Monson](https://github.com/karlmonson) - Author
- [Fast](https://fast.co) - Inspiration
- [Slack](https://slack.com) - Inspiration

## License

The MIT License (MIT). Please see [License File](https://github.com/karlmonson/laravel-magic/blob/master/LICENSE.md) for more information.
