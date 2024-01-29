<?php

namespace Webchefz\GeoLocationCalculator;

/**
 * GeoLocationCalculator Class
 * A class for calculating the distance between two geographical locations on the Earth's surface.
 */
class GeoLocationCalculator
{
    /**
     * Calculates the distance between two geographical locations using the Haversine formula.
     *
     * @param float $lat1 Latitude of the first location in degrees.
     * @param float $lon1 Longitude of the first location in degrees.
     * @param float $lat2 Latitude of the second location in degrees.
     * @param float $lon2 Longitude of the second location in degrees.
     *
     * @return float Distance between the two locations in kilometers.
     */
    public static function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        // Radius of the Earth in kilometers
        $earthRadius = 6371;

        // Convert latitude and longitude from degrees to radians
        $lat1Rad = deg2rad($lat1);
        $lon1Rad = deg2rad($lon1);
        $lat2Rad = deg2rad($lat2);
        $lon2Rad = deg2rad($lon2);

        // Calculate differences in latitude and longitude
        $deltaLat = $lat2Rad - $lat1Rad;
        $deltaLon = $lon2Rad - $lon1Rad;

        // Haversine formula
        $a = sin($deltaLat / 2) ** 2 + cos($lat1Rad) * cos($lat2Rad) * sin($deltaLon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        // Return the calculated distance
        return $distance;
    }
}