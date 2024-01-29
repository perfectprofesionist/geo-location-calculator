# Description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/webchefz/geo-location-calculator.svg?style=flat-square)](https://packagist.org/packages/webchefz/geo-location-calculator)
[![Total Downloads](https://img.shields.io/packagist/dt/webchefz/geo-location-calculator.svg?style=flat-square)](https://packagist.org/packages/webchefz/geo-location-calculator)



## Installation

You can install the package via composer:

```bash
composer require webchefz/geo-location-calculator
```

## Usage

```php
<?php

// Import the GeoLocationCalculator class from the Webchefz\GeoLocationCalculator namespace
use Webchefz\GeoLocationCalculator\GeoLocationCalculator;

// Load Composer's autoloader to autoload the required classes
require 'vendor/autoload.php';

// Coordinates for the first location (Sydney, Australia)
$latitudeSydney = -33.8688;    // Latitude of Sydney
$longitudeSydney = 151.2093;   // Longitude of Sydney

// Coordinates for the second location (Melbourne, Australia)
$latitudeMelbourne = -37.8136;    // Latitude of Melbourne
$longitudeMelbourne = 144.9631;   // Longitude of Melbourne

// Calculate the distance between Sydney and Melbourne using the GeoLocationCalculator class
// The GeoLocationCalculator::calculateDistance method returns the distance in kilometers
$distanceBetweenSydneyAndMelbourne = GeoLocationCalculator::calculateDistance($latitudeSydney, $longitudeSydney, $latitudeMelbourne, $longitudeMelbourne);

// Output the calculated distance in Killometers
echo $distanceBetweenSydneyAndMelbourne;

```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@webchefz.com instead of using the issue tracker.

## Credits

-   [Webchefz](https://github.com/perfectprofesionist)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


