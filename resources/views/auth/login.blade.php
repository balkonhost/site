@extends('layout')

@section('title', 'Авторизация / Балкон.Хост')
@section('description', 'Вход для клиентов.')

@section('main')
    <div class="container">
        <h1 class="my-5 text-center">Вроде бы я свой</h1>

        <div class="card-group mb-5">
            <div class="card border-4">
                <div class="card-body p-5">
                    <h5 class="card-title mb-3">Если свой — вспоминай явки и пароли.</h5>
                    <form method="POST" action="{{ route('login') }}" class="needs-validation">
                        @csrf

                        @if ($errors->any() || $message = session()->pull('error'))
                            <div class="login-error">{!! $message ?? 'Куда это ты намылиться, ты точно «свой»?' !!}</div>
                        @elseif($message = session()->pull('status'))
                            <div class="login-success">{!! $message !!}</div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">Мыло</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="email-help" placeholder="Какое мыло?" required autocomplete="email" autofocus>
                            @error('email')
                            <small id="email-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Шифр</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" aria-describedby="password-help" placeholder="Пароль помнишь?" required autocomplete="current-password">
                            @error('password')
                            <small id="password-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Запомнить</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="float-end" href="{{ route('password.request') }}">
                                    Заколебался уже
                                </a>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Намылиться</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-5">
                    <h5 class="card-title mb-3">Если с другого района — придется пришиваться.</h5>
                    <p class="card-text">Если ты впервые у нас и решил «забалконится», то придется поведать как тебя кличут и как можно до тебя достучаться.</p>
                    <a href="{{ route('register') }}" class="btn btn-primary mb-4">Хочу пришиться</a>
                    <p class="card-text"><small class="text-muted">Для «своих» у нас вроде есть какие-то плюшки и звездюли. Хотя, на наш взгляд, плюшки эти — хрень полная, а вот звездюли вроде ничего.</small></p>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <a class="text-muted" href="{{ route('index') }}">Ну, я пошёл от сюда…</a>
        </div>
    </div>
@endsection
