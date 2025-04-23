<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Cek Cuaca - {{ $city }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .weather-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #0d6efd;
        }
        .weather-icon {
            width: 100px;
            height: 100px;
            margin: 0 auto;
            display: block;
        }
        .temperature {
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
        }
        .weather-details {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="weather-container">
            <div class="header">
                <h1>Informasi Cuaca</h1>
                <h2>{{ $city }}, {{ $weatherData['sys']['country'] }}</h2>
                <p>{{ date('d F Y, H:i', time()) }}</p>
            </div>

            <div class="text-center mb-4">
                <img src="https://openweathermap.org/img/wn/{{ $weatherData['weather'][0]['icon'] }}@2x.png"
                     alt="{{ $weatherData['weather'][0]['description'] }}" class="weather-icon">
                <h3>{{ ucfirst($weatherData['weather'][0]['description']) }}</h3>
                <div class="temperature">{{ round($weatherData['main']['temp']) }}°C</div>
                <div>Terasa seperti: {{ round($weatherData['main']['feels_like']) }}°C</div>
            </div>

            <div class="weather-details">
                <div class="detail-item">
                    <span>Kelembaban</span>
                    <span>{{ $weatherData['main']['humidity'] }}%</span>
                </div>
                <div class="detail-item">
                    <span>Tekanan</span>
                    <span>{{ $weatherData['main']['pressure'] }} hPa</span>
                </div>
                <div class="detail-item">
                    <span>Kecepatan Angin</span>
                    <span>{{ $weatherData['wind']['speed'] }} m/s</span>
                </div>
                <div class="detail-item">
                    <span>Visibilitas</span>
                    <span>{{ $weatherData['visibility'] / 1000 }} km</span>
                </div>
                <div class="detail-item">
                    <span>Matahari Terbit</span>
                    <span>{{ date('H:i', $weatherData['sys']['sunrise']) }}</span>
                </div>
                <div class="detail-item">
                    <span>Matahari Terbenam</span>
                    <span>{{ date('H:i', $weatherData['sys']['sunset']) }}</span>
                </div>
            </div>

            <div class="mt-4 d-grid">
                <a href="{{ route('weather.index') }}" class="btn btn-primary">Cek Kota Lain</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
