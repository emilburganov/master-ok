@extends('index')

@section('content')
    <div class="flex col g-40 m-40-0">
        <form method="GET" action="{{ route('applications.index') }}" class="card flex g-20 w-400">
            <select onchange="this.form.submit()" class="input" name="status_id">
                @foreach($statuses as $status)
                    <option
                        value="{{$status->id}}"
                        @selected($status->id == $status_id)
                    >
                        {{$status->name}}
                    </option>
                @endforeach
            </select>
        </form>
        <div class="card-grid">
            @foreach($applications as $application)
                <div class="card">
                    <div class="flex col g-20">
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
                            <div class="key-value wrap g-10">
                                <span>Описание заявки:</span>
                                <p>{{$application->description}}</p>
                            </div>
                            <div class="key-value">
                                <span>Категория заявки:</span>
                                <p>{{$application->category->name}}</p>
                            </div>
                            <div class="key-value">
                                <span>Согласованная цена:</span>
                                <p>{{$application->max_price}}₽</p>
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
@endsection('content')

