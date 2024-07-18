@extends('layout')

@section('title', 'Восстановление / Балкон.Хост')
@section('description', 'Восстановление пароля.')

@section('main')
    <div class="container">
        <h1 class="my-5 text-center">Помогите, пацаны!</h1>

        <div class="card-group mb-5">
            <div class="card border-4">
                <div class="card-body p-5">
                    <h5 class="card-title mb-3">Походу я забыл все явки и пароли.</h5>

                    <form method="POST" action="{{ route('password.request') }}" class="needs-validation">
                        @csrf

                        @if ($errors->any() || $message = session()->pull('error'))
                            <div class="login-error">{!! $message ?? 'А ты точно «свой»?' !!}</div>
                        @elseif($message = session()->pull('status'))
                            <div class="login-success">{!! $message !!}</div>
                        @endif

                        <div class="mb-4">
                            <label for="email" class="form-label">Но мыло помню</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="email-help" placeholder="Какое мыло?" required autocomplete="email" autofocus>
                            @error('email')
                            <small id="email-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Помогите</button>
                        @if (Route::has('login'))
                            <a class="btn btn-link float-end" href="{{ route('login') }}">Хотя не, я сам справлюсь</a>
                        @endif
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body p-5">
                    <h5 class="card-title mb-3">Мне упала какая-то малява.</h5>
                    <p class="card-text">Ничего не понял, но на мыло пришла какая-то хрень.</p>
                    <a href="{{ route('password.reset', 'token') }}" class="btn btn-primary mb-4">Что делать?</a>
                    <p class="card-text"><small class="text-muted"></small></p>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <a class="text-muted" href="{{ route('register') }}">Я с другого района</a>
        </div>
    </div>
@endsection
