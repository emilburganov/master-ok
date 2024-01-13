<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>MasterOK</title>
<body>

@include('layouts.partials.header')

<main>
    <div class="container centered-container">

        @yield('content')

    </div>
</main>

@include('layouts.partials.footer')

</body>
</html>
