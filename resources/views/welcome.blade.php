<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        a {
            color: #007bff; /* Blue color for the anchor */
            text-decoration: none; /* Remove underline */
            margin-right: 10px; /* Add margin for spacing between links */
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            font-size: 22px;
            text-align: center;
            font-weight: 900;
        }
        .aa{
            text-align: center;
        }
    </style>
</head>
<body class="">
    <div class="">
        <div class="">
            <div class="">
                <header class="">
                    @if (Route::has('login'))
                    <nav class="aa">
                        @auth
                        {{-- <a href="{{ route('register') }}">Register</a> --}}
                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                        @else
                        @endauth
                    </nav>
                    @endif
                </header>
                <main>
                    <div>
                        <a href="https://laravel.com/docs" id="docs-card"></a>
                    </div>
                </main>
                
            </div>
        </div>
    </div>
</body>
</html>
