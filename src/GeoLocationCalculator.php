<?php

namespace Webchefz\GeoLocationCalculator;

/**
 * GeoLocationCalculator Class
 * A class for calculating the distance between two geographical locations on the Earth's surface.
 */
class GeoLocationCalculator
{
    private static  $cities ;
    public function __construct() {
        self::$cities = require 'assets/cities.php';
    }

    /**
     * Calculates the distance between two geographical locations using the Haversine formula.
     *
     * @param float $lat1 Latitude of the first location in degrees.
     * @param float $lon1 Longitude of the first location in degrees.
     * @param float $lat2 Latitude of the second location in degrees.
     * @param float $lon2 Longitude of the second location in degrees.
     *
     * @return float Distance between the two locations in kilometers.
     * 
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


    /**
     * Calculates the distance between two cities using their names, country names, and state names.
     *
     * @param mixed $city1 First city information (array or string).
     * @param mixed $city2 Second city information (array or string).
     *
     * @return array|string Result of the distance calculation or an error message.
     * 
     */
    public static function calculateDistanceBetweenDefinedCities($city1, $city2)
    {
        // Initialize arrays to store matching city details
        $matchingCityDetails1 = $matchingCityDetails2 = [];

        // Create an instance of GeoLocationCalculator class
        $geoLocationCalculator = new GeoLocationCalculator();

        // Check if both city inputs are arrays
        if (is_array($city1) && is_array($city2)) {
            // Loop through cities data in GeoLocationCalculator class
            foreach ($geoLocationCalculator::$cities as $city) {
                // Check if the current city matches the first input city
                if ($city["name"] == $city1["name"] && $city["country_name"] == $city1["country_name"] && $city["state_name"] == $city1["state_name"]) {
                    $matchingCityDetails1[] = $city;
                }
                // Check if the current city matches the second input city
                elseif ($city["name"] == $city2["name"] && $city["country_name"] == $city2["country_name"] && $city["state_name"] == $city2["state_name"]) {
                    $matchingCityDetails2[] = $city;
                }
            }
        } 
        // Check if both city inputs are strings
        elseif (is_string($city1) && is_string($city2)) {
            // Loop through cities data in GeoLocationCalculator class
            foreach ($geoLocationCalculator::$cities as $city) {
                // Check if the current city matches the first input city
                if ($city["name"] == $city1) {
                    $matchingCityDetails1[] = $city;
                }
                // Check if the current city matches the second input city
                if ($city["name"] == $city2) {
                    $matchingCityDetails2[] = $city;
                }
            }
        }

        // Check if any matching city details are missing
        if (empty($matchingCityDetails1) || empty($matchingCityDetails2)) {
            return [
                "error" => "Data not available in the system. Calculate with exact coordinates using the 'calculateDistance' function."
            ];
        } 
        // Check if there is only one match for each input city
        elseif (count($matchingCityDetails1) == 1 && count($matchingCityDetails2) == 1) {
            // Extract latitude and longitude for both cities
            $lat1 = $matchingCityDetails1[0]["lat"];
            $lon1 = $matchingCityDetails1[0]["lng"];
            $lat2 = $matchingCityDetails2[0]["lat"];
            $lon2 = $matchingCityDetails2[0]["lng"];

            // Calculate and return the distance using the GeoLocationCalculator class
            return $geoLocationCalculator::calculateDistance($lat1, $lon1, $lat2, $lon2);
        } 
        // Handle cases where there are multiple matches for either input city
        else {
            // Handle multiple matches for the first input city
            if (count($matchingCityDetails1) > 1) {
                $cityDetails = [];
                foreach ($matchingCityDetails1 as $cityElement) {
                    $cityDetails[] = $cityElement["name"] . "," . $cityElement["state_name"] . "," . $cityElement["country_name"];
                }
                return [
                    "error" => "Which city \"" . $matchingCityDetails1[0]["name"] . "\" do you mean? \"" . implode("\" or \"", $cityDetails) . "\""
                ];
            }
            // Handle multiple matches for the second input city
            if (count($matchingCityDetails2) > 1) {
                $cityDetails = [];
                foreach ($matchingCityDetails2 as $cityElement) {
                    $cityDetails[] = $cityElement["name"] . "," . $cityElement["state_name"] . "," . $cityElement["country_name"];
                }
                return [
                    "error" => "Which city \"" . $matchingCityDetails2[0]["name"] . "\" do you mean? \"" . implode("\" or \"", $cityDetails) . "\""
                ];
            }
        }
    }

}