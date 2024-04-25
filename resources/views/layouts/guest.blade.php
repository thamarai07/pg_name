<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
</head>
<body >
<div class="guest_container">
    <div>
        <p class="">spmnest</p>
    </div>

    <div class="">
        {{ $slot }}
    </div>
</div>

<!-- Bootstrap JS -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
