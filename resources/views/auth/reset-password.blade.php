@extends('layout')

@section('title', 'Восстановление / Балкон.Хост')
@section('description', 'Изменение пароля.')

@section('main')
    <div class="container">
        <h1 class="my-5 text-center">Помогите, пацаны!</h1>

        <div class="card-group mb-5">
            <div class="card">
                <div class="card-body p-5">
                    <h5 class="card-title mb-3">Походу я забыл все явки и пароли.</h5>
                    <p class="card-text"><small class="text-muted">Я не хочу ничего восстанавливать, никакие явки и пароли мне уже не нужны. Просто отшейте меня и все тут.</small></p>
                    <a href="javascript:window.close();" class="btn btn-primary mb-4">Сигануть с балкона</a>
                </div>
            </div>
            <div class="card border-start border-4">
                <div class="card-body p-5">
                    <h5 class="card-title mb-3">Мне упала какая-то малява.</h5>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        @if ($errors->any() || $message = session()->pull('error'))
                            <div class="login-error">{!! $message ?? 'Опа, ошибочка вышла!' !!}</div>
                        @elseif($message = session()->pull('status'))
                            <div class="login-success">{!! $message !!}</div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">На мыло</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ request()->email ?? old('email') }}" aria-describedby="email-help" placeholder="Какое мыло?" required autocomplete="email">
                            @error('email')
                            <small id="email-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="token" class="form-label">Пришла вот такая хрень</label>
                            <input type="text" class="form-control @error('token') is-invalid @enderror" id="token" name="token" value="{{ str_replace('token', '', request()->token) ?? old('token') }}" aria-describedby="token-help" placeholder="Какой-то шифр" required>
                            @error('token')
                            <small id="token-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">В общем, я хочу новый шифр</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" aria-describedby="password-help" placeholder="Новый пароль" required autofocus>
                            @error('password')
                            <small id="password-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Да, именно такой</label>
                            <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" aria-describedby="confirmation-help" placeholder="Повтори новый пароль" required>
                            @error('password_confirmation')
                            <small id="confirmation-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Сменить шифр</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <a class="text-muted" href="{{ route('register') }}">Я с другого района</a>
        </div>
    </div>
@endsection
