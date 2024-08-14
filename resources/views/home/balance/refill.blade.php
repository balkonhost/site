@extends('home')

@section('title', 'Баланс / Личный кабинет / Балкон.Хост')
@section('description', 'Как бы пополнение баланса.')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Личный кабинет</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home.balance') }}">Баланс</a></li>
            <li class="breadcrumb-item active" aria-current="page">Пополнение</li>
        </ol>
    </nav>

    <h1>Пополнение баланса</h1>
@endsection

@section('content')
    <div class="alert alert-primary" role="alert">
        На данный момент ты можешь пополнить баланс только скинув свои кровные на карту Сбера.
    </div>

    <form method="POST" action="{{ route('home.balance.refill') }}">
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="mb-3 row g-3">
                    <label for="domain" class="form-label">Ссыкотно конечно, но я готов пополнить свой баланс на сумму</label>

                    <div class="col-9">
                        <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount') }}" placeholder="от 10 до 5000 деревянных" aria-describedby="amount-help" autofocus>
                        @error('amount')
                            <small id="domain-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                        @else
                            <small id="domain-help" class="form-text" role="alert">Укажите сумму, нажмите пополнить и четко выполняйте дальнейшие инструкции.</small>
                        @enderror
                    </div>
                    <div class="col-3">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary mb-3">Пополнить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
