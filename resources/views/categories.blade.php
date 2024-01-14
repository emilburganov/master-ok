@extends('index')

@section('content')
    <div class="flex col g-40 m-40-0">
        <h2>Список категорий</h2>
        <div class="card-grid">
            @foreach($categories as $category)
                <div class="card p-0">
                    <div class="p-20 flex col g-20">
                        <div class="flex col g-20">
                            <div class="key-value">
                                <span>ID:</span>
                                <p>{{$category->id}}</p>
                            </div>
                            <div class="key-value">
                                <span>Название:</span>
                                <p>{{$category->name}}</p>
                            </div>
                            <a
                                href="{{ route('categories.delete', ['category' => $category]) }}"
                                class="button danger"
                            >
                                Удалить
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection('content')

