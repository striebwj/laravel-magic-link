# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/airranged/laravel-magic-link.svg?style=flat-square)](https://packagist.org/packages/airranged/laravel-magic-link)
[![Total Downloads](https://img.shields.io/packagist/dt/airranged/laravel-magic-link.svg?style=flat-square)](https://packagist.org/packages/airranged/laravel-magic-link)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require airranged/laravel-magic-link
```

## Usage

To get started first run `php artisan vendor:publish` to publish all the views and the config file. Once that is done your Laravel project can start allowing users to use the magic link to login in.

### Advanced Usage

You can edit the routes users visit by adding the following to your `.env` file

`MAGIC_ROUTE` is where your users will go to request a magic login link

`LOGIN_ROUTE` is the url that will handle the auto login

`REDIRECT_ROUTE` is where signed in users will be redirected to

```
MAGIC_ROUTE="/secret_login"
LOGIN_ROUTE="/autologin"
REDIRECT_ROUTE="/dashboard"
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email opensource@airranged.ca instead of using the issue tracker.

## Credits

- [Airranged](https://github.com/airranged)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
