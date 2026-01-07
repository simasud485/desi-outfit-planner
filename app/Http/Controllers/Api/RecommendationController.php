<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Outfit;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;

class RecommendationController extends Controller
{
    // inject WeatherService class property
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    // main logic start here
    public function getRecommendation($city): JsonResponse
    {
        // fetch current weather of a city using our service
        $weatherData = $this->weatherService->getFetch($city);

        // Handle cases where the city doesn't exists or api is down
        if (! $weatherData) {
            return response()->json([
                'status' => 'error',
                'message' => 'Could not retrive weather for '.$city,
            ], 404);
        }

        // extract the temperature
        $currentTemp = $weatherData['main']['temp'];
        $condition = $weatherData['weather'][0]['main'];

        // Business Logic: search database for matching outfit
        // we look for an outfit where the temperature falls between min and max
        $outfit = Outfit::where('min_temp', '<=', $currentTemp)
            ->where('max_temp', '>=', $currentTemp)
            ->first();

        // DYNAMIC LOGIC: Create advice on the fly
        $advice = "It's {$currentTemp}°C in {$weatherData['name']}. ";

        if ($condition === 'Rain') {
            $advice .= "Since it's raining, carry an umbrella with your {$outfit->name}.";
        } elseif ($currentTemp < 15) {
            $advice .= "The wind is cold today; that {$outfit->name} will keep you cozy!";
        } else {
            $advice .= "Enjoy the {$condition} weather!";
        }

        // Return a clean, professional JSON response
        return response()->json([
            'status' => 'success',
            'data' => [
                'location' => $weatherData['name'],
                'temp' => $currentTemp,
                'condition' => $condition,
                'recommendation' => [
                    'outfit_name' => $outfit ? $outfit->name : 'Standard Cotton Panjabi',
                    'style' => $outfit ? $outfit->type : 'Casual',
                    'advice' => $advice, // Now this is actually dynamic!

                ],
            ],

        ], 200);

    }

    // Helper method for localized advice(Desi context)
    private function generateDesiAdvice($temp, $condition)
    {
        if (str_contains($condition, 'Rain')) {
            return 'Expect rain! Dark colors are better to hide mud splashes.';
        }
        if ($temp > 33) {
            return 'Extremely hot! Stick to 100% cotton and carry a water bottle.';
        }

        return 'Weather is pleasant for outdoor activities.';
    }

    public function index()
    {
        // dd($this->weatherService);
        $weatherData = $this->weatherService->getFetch('Dhaka');

        // 2. Now you can print it
        dd($weatherData);
    }
}
