# Description of the package

[![Latest Stable Version](https://poser.pugx.org/webchefz/geo-location-calculator/version.svg?style=flat-square)](https://packagist.org/packages/webchefz/geo-location-calculator)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/webchefz/geo-location-calculator.svg?style=flat-square)](https://packagist.org/packages/webchefz/geo-location-calculator)
[![Total Downloads](https://img.shields.io/packagist/dt/webchefz/geo-location-calculator.svg?style=flat-square)](https://packagist.org/packages/webchefz/geo-location-calculator)
[![Total Downloads](https://poser.pugx.org/webchefz/geo-location-calculator/require/php?style=flat-square)](https://packagist.org/packages/webchefz/geo-location-calculator)



## Installation
The ***webchefz/geo-location-calculator*** package is a software component or module designed to facilitate the calculation of distances between geographical locations on the Earth's surface. It is particularly useful for applications that require spatial analysis or those that involve working with geographic data, such as mapping, navigation, or location-based services.

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


```php
<?php

// Import the GeoLocationCalculator class from the Webchefz\GeoLocationCalculator namespace
use Webchefz\GeoLocationCalculator\GeoLocationCalculator;

// Load Composer's autoloader to autoload the required classes
require 'vendor/autoload.php';

// Define details for the first city, Sydney, in an associative array
$sydneyDetails = [
    "name" => "Sydney",
    "country" => "Australia",
    "state" => "New South Wales"
];

// Define details for the second city, Melbourne, in an associative array
$melbourneDetails = [
    "name" => "Melbourne",
    "country" => "Australia",
    "state" => "Victoria"
];

// Calculate the distance between Sydney and Melbourne using a GeoLocationCalculator class
$distanceBetweenSydneyAndMelbourne = GeoLocationCalculator::calculateDistanceBetweenDefinedCities($sydneyDetails, $melbourneDetails);

// Display the calculated distance between Sydney and Melbourne
echo $distanceBetweenSydneyAndMelbourne;

```

```php
<?php

// Import the GeoLocationCalculator class from the Webchefz\GeoLocationCalculator namespace
use Webchefz\GeoLocationCalculator\GeoLocationCalculator;

// Load Composer's autoloader to autoload the required classes
require 'vendor/autoload.php';

// Switch the cities for the distance calculation
$switchedCity1 = "Sydney";
$switchedCity2 = "Melbourne";

// Recalculate the distance between the switched cities using the same GeoLocationCalculator class
$distanceBetweenSwitchedCities = GeoLocationCalculator::calculateDistanceBetweenDefinedCities($switchedCity1, $switchedCity2);

// Display the recalculated distance between the switched cities
echo $distanceBetweenSwitchedCities;

```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email info@webchefz.com instead of using the issue tracker.

## Credits

-   [Perfect Profesionist](https://github.com/perfectprofesionist)
-   [Webchefz](https://www.webchefz.com) 
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


