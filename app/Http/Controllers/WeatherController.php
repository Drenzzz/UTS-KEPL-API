<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    /**
     * Menampilkan form pencarian cuaca
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('weather.index');
    }

    /**
     * Mendapatkan data cuaca dari OpenWeather API
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function getWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255',
        ]);

        $city = $request->input('city');
        $apiKey = env('OPENWEATHER_API_KEY');

        try {
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric', // Menggunakan satuan Celsius
            ]);

            if ($response->successful()) {
                $weatherData = $response->json();
                return view('weather.result', compact('weatherData', 'city'));
            } else {
                return back()->withErrors(['error' => 'Kota tidak ditemukan. Silakan coba lagi.']);
            }
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }
}
