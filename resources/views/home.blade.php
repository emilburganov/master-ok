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
    <div class="container">
        <div class="m-40-0 flex g-20 ac">
            <div id="counter" class="card">
                <div class="flex col g-20">
                    <p data-count="{{$completedApplicationsCount}}">0</p>
                    <span>Отремонтированных помещений</span>
                </div>
            </div>
            <div id="counter" class="card">
                <div class="flex col g-20">
                    <p data-count="69">0</p>
                    <span>Енотов у нас в компании</span>
                </div>
            </div>
            <div id="counter" class="card">
                <div class="flex col g-20">
                    <p data-count="2">0</p>
                    <span>Мастеров работают у нас</span>
                </div>
            </div>
        </div>
        @if ($completedApplicationsCount > 0)
            <div class="flex col g-40 m-40-0">
                <h2 class="title">
                    Последние заявки
                </h2>
                <div class="card-grid">
                    @foreach($applications as $application)
                        <div class="card p-0">
                            <div class="flex hover-group">
                                <img src="{{ $application->image }}" alt="application">
                                <img src="{{ $application->completed_image }}" alt="application">
                            </div>
                            <div class="p-20 flex col g-20">
                                <div
                                    @class([
                                        'badge' => $application->status->name === 'Новая',
                                        'badge warning' => $application->status->name === 'Ремонтируется',
                                        'badge success' => $application->status->name === 'Отремонтировано',
                                    ])
                                >
                                    {{$application->status->name}}
                                </div>

                                <div class="flex col g-20">
                                    <div class="key-value">
                                        <span>Адрес помещения:</span>
                                        <p>{{$application->room_address}}</p>
                                    </div>
                                    <div class="key-value">
                                        <span>Категория заявки:</span>
                                        <p>{{$application->category->name}}</p>
                                    </div>
                                    <div class="key-value">
                                        <span>Создано:</span>
                                        <p>{{$application->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
        @endif
    </div>
</main>

@include('layouts.partials.footer')

<script src="{{ asset('assets/js/counter.js') }}"></script>

</body>
</html>
