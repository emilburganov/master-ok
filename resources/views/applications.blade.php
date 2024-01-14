@extends('index')

@section('content')
    <div class="flex col g-40 m-40-0">
        <h2>Личный кабинет</h2>
        <form method="GET" action="{{ route('applications.index') }}" class="flex sb card flex g-20">
            <div class="flex g-20">
                <select onchange="this.form.submit()" class="input w-400" name="status_id">
                    <option selected disabled>Статус заявки</option>
                    @foreach($statuses as $status)
                        <option
                            value="{{$status->id}}"
                            @if($status->id == $status_id)
                                selected
                            @endif
                        >
                            {{$status->name}}
                        </option>
                    @endforeach
                </select>
                <button class="button">Найти</button>
            </div>
            <a class="button" href="{{ route('applications.create') }}">Создать заявку</a>
        </form>
        <div class="card-grid">
            @foreach($applications as $application)
                <div class="card p-0">
                    <img src="{{ $application->image }}" alt="application">
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
                                <span>Описание заявки:</span>
                                <p>{{$application->description}}</p>
                            </div>
                            <div class="key-value">
                                <span>Категория заявки:</span>
                                <p>{{$application->category->name}}</p>
                            </div>
                            <div class="key-value">
                                <span>Согласованная цена:</span>
                                <p>{{$application->agreed_price}}₽</p>
                            </div>
                            <div class="key-value">
                                <span>Создано:</span>
                                <p>{{$application->created_at}}</p>
                            </div>
                            @if($application->status->name === 'Новая')
                                <button
                                    id="openModalButton"
                                    class="button danger"
                                >
                                    Удалить
                                </button>
                            @endif

                            @if($application->status->name === 'Новая')
                                <div id="modalContainer">
                                    <div id="modal" class="card flex g-40 col">
                                        <h3 class="title">Подтвеждение удаления заявки</h3>
                                        <div class="flex ac g-20">
                                            <a
                                                href="{{ route('applications.delete', ['application' => $application]) }}"
                                                class="button danger"
                                            >
                                                Удалить
                                            </a>
                                            <button id="closeModalButton" class="button">Выйти</button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection('content')

