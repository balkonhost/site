@extends('home')

@section('title', 'Баланс / Личный кабинет / Балкон.Хост')
@section('description', 'Информация о движении денежных средств.')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Личный кабинет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Баланс</li>
        </ol>
    </nav>

    <h1>Список операций</h1>
@endsection

@section('menu')
    @parent

    <div class="d-grid gap-2 mt-3">
        <a href="{{ route('home.balance.refill') }}" class="btn btn-light">Пополнить баланс</a>
    </div>
@endsection

@section('content')
    @if(!$transactions->count())

        <p>Все с тобой ясно, ты у нас жмот.</p>

    @else

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Дата</th>
                <th scope="col">Сумма</th>
                <th scope="col">Описание</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($transactions as $transaction)
                    @include("home.balance.list_". $transaction->type)
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mb-4">
            {{ $transactions->links() }}
        </div>

    @endif
@endsection
