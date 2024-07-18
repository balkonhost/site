@extends('layout')

@section('title', 'Регистрация / Балкон.Хост')
@section('description', 'Регистрация клиентов.')

@section('main')
    <div class="container">
        <h1 class="my-5 text-center">С другого района</h1>

        <div class="card-group mb-5">
            <div class="card border-end-0">
                <div class="card-body p-5">
                    <h5 class="card-title mb-3">Я вроде бы свой.</h5>
                    <p class="card-text">Тогда кажись ты попал не на свой этаж.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary mb-4" title="Вход для клиентов">Намылиться</a>
                    <p class="card-text"><small class="text-muted">Плюшки и звездюли для «своих» у нас этажом ниже. Хотя, на наш взгляд, плюшки эти — хрень полная, а вот звездюли вроде ничего.</small></p>

                </div>
            </div>
            <div class="card border-start border-4">
                <div class="card-body p-5">
                    <h5 class="card-title mb-3">Ну чё, будешь пришиваться?</h5>

                    <form method="POST" action="{{ route('register') }}" class="needs-validation">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Как тебя кличут?</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" aria-describedby="name-help" placeholder="Звать то как?" required autocomplete="name" autofocus>
                            @error('name')
                            <small id="email-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Как тебя найти?</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" aria-describedby="email-help" placeholder="Какое мыло?" required autocomplete="email">
                            @error('email')
                            <small id="email-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                            <small id="email-help" class="form-text text-muted">На указанное мыло ты получишь явки и пароли.</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check @error('offer') is-invalid @enderror">
                                <input class="form-check-input @error('offer') is-invalid @enderror" type="checkbox" name="offer" id="offer" {{ old('offer') ? 'checked' : '' }}>
                                <label for="offer">
                                    Я не в кусре ваших <a href='' target='_blank'>правил</a>, но заранее на все согласен!
                                </label>
                            </div>
                            @error('offer')
                            <small class="invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Пришейте меня</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <a class="text-muted" href="{{ route('index') }}">Да иди уже давай от сюда…</a>
        </div>
    </div>
@endsection
