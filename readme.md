# Laravel Dashboard RSS Feed Tile

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-packagist]

![Preview](docs/example.png)

Use [the Spatie Laravel Dashboard](https://docs.spatie.be/laravel-dashboard) as a News feed by display RSS items.

Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require phpadam/dashboardspatiersstile
```

You need to publish [SimplePie Laravel Service Provider](https://github.com/willvincent/Feeds) config file.

``` bash
$ php artisan vendor:publish --provider="willvincent\Feeds\FeedsServiceProvider"
```

In `app\Console\Kernel.php` you should schedule the `\Phpadam\DashboardSpatieRssTile\Commands\FetchDataFromApiCommand` to run every minute.

```php
// in app/console/Kernel.php

protected function schedule(Schedule $schedule)
{
    $schedule->command(\Phpadam\DashboardSpatieRssTile\Commands\FetchDataFromApiCommand::class)->everyMinute();
}
```

In your dashboard view you can use the `livewire:RssTile` component.

```html
<x-dashboard>
  <livewire:RssTile position="a1" />
</x-dashboard>
```

## Usage

In the `dashboard` config file, you must add this configuration in the `tiles` key.

Replacing the RSS feeds with your preferred news sources.

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'rsstile' => [
            'feeds' => 'https://domainone.com/feed.xml,https://domaintwo.com/feed.xml',
            'refresh_interval_in_seconds' => 60,
        ]
    ],
];
```


### Customising the view

If you want to customise the view used to render this tile, run this command:

```bash
php artisan vendor:publish --provider="Phpadam\DashboardSpatieRssTile\DashboardSpatieRssTileServiceProvider" --tag="DashboardSpatieRssTile-views"
```


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Dependencies
- [spatie/laravel-dashboard](https://github.com/spatie/laravel-dashboard) create beautiful dashboards
- [willvincent/feeds](https://github.com/willvincent/feeds/) A Laravel service provider for including the SimplePie library.
- [simplepie/simplepie](https://github.com/simplepie/simplepie) RSS and Atom feed parsing in PHP.

Please note as of creating `willvincent/feeds` does not support Laravel 8. A branch has been used to increase compatibility until `willvincent/feeds` is updated.

## Credits

- [Adam Hosker][link-author]
- [All Contributors][link-contributors]

## License

Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/phpadam/dashboardspatiersstile.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/phpadam/dashboardspatiersstile.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/phpadam/dashboardspatiersstile
[link-author]: https://github.com/phpadam
[link-contributors]: ../../contributors
