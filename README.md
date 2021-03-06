# Laravel Queue Size Command
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE)
[![Build Status][ico-tests]][link-tests]
[![Total Downloads][ico-downloads]][link-downloads]

This package offers an artisan command to check queue size in your application.

## Installation

You can install the package via composer:

``` bash
composer require ilzrv/laravel-queue-size
```

## Usage

To check the queue size you can use this command:

```bash
php artisan queue:size
```

To check the size of another queue:

```bash
php artisan queue:size --queue=awesome-queue
```

To check the size of another connection:

```bash
php artisan queue:size redis --queue=awesome-queue
```

### License

The Laravel Queue Size Command is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

[ico-version]: https://img.shields.io/packagist/v/ilzrv/laravel-queue-size
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-tests]: https://github.com/ilzrv/laravel-queue-size/workflows/tests/badge.svg
[ico-downloads]: https://img.shields.io/packagist/dt/ilzrv/laravel-queue-size

[link-packagist]: https://packagist.org/packages/ilzrv/laravel-queue-size
[link-tests]: https://github.com/ilzrv/laravel-queue-size/actions?query=workflow:tests
[link-downloads]: https://packagist.org/packages/ilzrv/laravel-queue-size
