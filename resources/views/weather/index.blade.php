<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Cek Cuaca</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="weather-container">
            <div class="header">
                <h1>Aplikasi Cek Cuaca</h1>
                <p class="lead">Masukkan nama kota untuk mendapatkan informasi cuaca terkini</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('weather.get') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="city" class="form-label">Nama Kota</label>
                    <input type="text" class="form-control" id="city" name="city"
                           placeholder="Contoh: Jakarta, Padang, Bandung" required>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Cek Cuaca</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
