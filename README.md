<p align="center">
    <img alt="Nuky" src="https://image.ibb.co/cptpRb/nuky.png">
</p>

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A Laravel 5 package that switch default Laravel scaffolding / boilerplate to UIkit template.


## Install

Via Composer

``` bash
"require": {
    "abr4xas/nuky": "dev-master"
}
```

* In Laravel 5.5 the package will autoregister the service provider. 
* In Laravel 5.4 you must install this service provider.

```php
// config/app.php
'providers' => [
    Abr4xas\Nuky\nukyServiceProvider::class
];
```

Then:

```bash
php artisan vendor:publish --tag=nuky --force
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE OF CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please  click [here](https://github.com/abr4xas/nuky/issues/new).

## Support

Does your business depend on our contributions? Reach out and support me on [Patreon](https://www.patreon.com/abr4xas). All pledges will be dedicated to allocating workforce on maintenance and new awesome stuff.

## Credits

* Laravel package: [Angel Cruz](https://github.com/abr4xas)
* HTML template: [Erik Campobadal](https://github.com/ConsoleTVs/Nuky)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/abr4xas/nuky.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/abr4xas/nuky/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/abr4xas/nuky.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/abr4xas/nuky.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/abr4xas/nuky.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/abr4xas/nuky
[link-travis]: https://travis-ci.org/abr4xas/nuky
[link-scrutinizer]: https://scrutinizer-ci.com/g/abr4xas/nuky/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/abr4xas/nuky
[link-downloads]: https://packagist.org/packages/abr4xas/nuky
[link-author]: https://github.com/abr4xas
[link-contributors]: ../../contributors
