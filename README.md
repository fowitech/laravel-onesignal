# Laravel OneSignal Push Notifications

![GitHub License](https://img.shields.io/github/license/fowitech/laravel-onesignal?style=for-the-badge)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/fowitech/laravel-onesignal.svg?style=for-the-badge&logo=composer)](https://packagist.org/packages/fowitech/laravel-onesignal)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/fowitech/laravel-onesignal/Tests?label=tests&style=for-the-badge&logo=github)](https://github.com/fowitech/laravel-onesignal/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/fowitech/laravel-onesignal.svg?style=for-the-badge&logo=laravel)](https://packagist.org/packages/fowitech/laravel-onesignal)

This is a straightforward OneSignal wrapper library designed for Laravel.

## :package: Install

Via Composer

``` bash
$ composer require fowitech/laravel-onesignal
```

## :zap: Configure

Publish the config file

```bash
$ php artisan vendor:publish --tag="fowitech-onesignal"
```

## :fire: Usage

In your code just use it like this.
```php
onesignal()->message("this message")->to(['Number 1', 'Number 2'])->send();
```

## :microscope: Testing

``` bash
composer test
```
