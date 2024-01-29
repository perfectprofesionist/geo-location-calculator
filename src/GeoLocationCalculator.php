<?php

namespace Webchefz\GeoLocationCalculator;

class GeoLocationCalculator
{
    public static function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $R = 6371; // Radius of the Earth in kilometers
        
        // Convert latitude and longitude from degrees to radians
        $lat1Rad = deg2rad($lat1);
        $lon1Rad = deg2rad($lon1);
        $lat2Rad = deg2rad($lat2);
        $lon2Rad = deg2rad($lon2);
        
        // Calculate differences
        $deltaLat = $lat2Rad - $lat1Rad;
        $deltaLon = $lon2Rad - $lon1Rad;
        
        // Haversine formula
        $a = sin($deltaLat / 2) ** 2 + cos($lat1Rad) * cos($lat2Rad) * sin($deltaLon / 2) ** 2;
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $R * $c;
        
        return $distance;
    }
}
