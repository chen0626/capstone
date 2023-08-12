<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RescuePaws</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--  additional styles -->
    <style>
        body {
            background-image: url('/images/golden.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        .bc {
            background-color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body class="antialiased">
    <div class="container">
        <div class="row justify-content-end p-4">
            @if (Route::has('login'))
                <div class="col-auto">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
                    @endauth
                </div>
            @endif
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <div class="bc p-5 rounded-lg shadow-lg">
                    <h2 class="mb-3 text-3xl font-semibold text-gray-800">Welcome to RescuePaws:</h2>
                    <h4 class="mb-3 text-3xl font-semibold text-gray-800">Making a Difference One Paw at a Time</h4>
                
                    <p class="mb-4 text-gray-700">
                        At RescuePaws, we're on a mission to transform the lives of stray animals and ensure they receive the love, care, and support they deserve. Our platform brings together compassionate individuals like you who want to make a positive impact on the lives of these innocent creatures.
                    </p>
                    <p class="mb-4 text-gray-700">
                        We believe in collective action. Join us in our mission to provide a helping hand to these innocent beings, making a tangible difference one donation at a time.
                    </p>
                    @if (Route::has('register'))
                        <div class="text-end">
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col text-center text-sm text-white">
                <p>RescuePaws Official Donation Website. Built and designed by Run Wen & Muzhen Chen.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
