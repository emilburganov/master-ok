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
    <div class="counter-container">

        <div class="h-auto container">
            <div id="counter" class="card">
                <div class="flex col g-20">
                    <p data-count="{{$completedApplicationsCount}}">0</p>
                    <span>Отремонтированных помещений</span>
                </div>
            </div>
        </div>

    </div>
</main>

@include('layouts.partials.footer')

<script src="{{ asset('assets/js/index.js') }}"></script>

</body>
</html>
