@extends('index')

@section('content')
    <div class="flex col g-40 m-40-0">
        <h2>Заявки пользователей</h2>
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
                            @if($application->status->name === 'Новая')
                                <div class="key-value">
                                    <span>Максимальная цена:</span>
                                    <p>{{$application->max_price}}₽</p>
                                </div>
                            @else
                                <div class="key-value">
                                    <span>Согласованная цена:</span>
                                    <p>{{$application->agreed_price}}₽</p>
                                </div>
                            @endif

                            <div class="key-value">
                                <span>Создано:</span>
                                <p>{{$application->created_at}}</p>
                            </div>

                            @if($application->status->name !== 'Отремонтировано')
                                <form enctype="multipart/form-data" method="POST"
                                      action="{{ route('admin-applications.update', ['application' => $application]) }}"
                                      class="flex col g-20">
                                    @csrf
                                    @if($application->status->name === 'Новая')
                                        <div class="input-group">
                                            <label>Согласованная цена:</label>
                                            <input class="input" name="agreed_price" value="{{$application->max_price}}"
                                                   type="number">
                                        </div>
                                    @endif
                                    <div class="input-group">
                                        <label>Статус заявки:</label>
                                        <select class="input" name="status_id">
                                            @foreach($statuses as $status)
                                                <option value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($application->status->name === 'Ремонтируется')
                                        <div class="input-group">
                                            <label>Фото после:</label>
                                            <input class="input" name="completed_image" type="file">
                                        </div>
                                    @endif
                                    <button class="button">Обновить</button>
                                    @foreach($errors->all() as $error)
                                        <p class="error">{{ $error }}</p>
                                    @endforeach
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

