<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherService
{
    // Fetch weather from OpenWeatherMap API
    public function getFetch($city)
    {
        // 1. Get the api key from the .env file
        $apiKey = config('services.weather.key');
        $baseUrl = config('services.weather.url');

        try {
            // 2. use Laravel's HTTP client to make the call
            /** @var \Illuminate\Http\Client\Response $response */
            $response = Http::timeout(10)->get($baseUrl, [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric', // for celcious, not fahrenheit
            ]);

            // 3. check the request was successful
            if ($response->successful()) {
                return $response->json();
            }

            // 4. Log errors if the API call fails (e.g., city not found)
            Log::warning("Weather API failed for city: {$city}, Status:{$response->status()}");

            return null;
        } catch (\Exception $e) {
            // 5. catch Network crashes(e.g., no internet)
            Log::error('Connection to Weather API failed:'.$e->getMessage());

            return null;
        }

    }
}
