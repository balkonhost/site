@extends('layout')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Корзина</li>
            </ol>
        </nav>

        <h1>Корзина</h1>
        @if(!count($items))
            <p>Корзина то пуста. А вот ваш кошелек тоже пуст?</p>
        @else
            <p><a href="{{ route('cart.clear') }}" title="Очистить корзину">Очистить корзину</a></p>

            <div class="row row-cols-1 row-cols-md-1 g-4">
                @foreach($items as $item)

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="card-text">{{ $item->name }}</p>
                                        <h5 class="card-title">{{ $item->attributes->domain }}</h5>
                                    </div>
                                    <div>
                                        <div class="card-text">{{ $item->price }} ₽</div>
                                        <a href="{{ route('cart.remove', ['id' => $item->id]) }}" title="Удалить">Удалить</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

              @endforeach
            </div>

            <div class="my-5">Итого: {{ $total }} ₽</div>
        @endif
    </div>
@endsection
