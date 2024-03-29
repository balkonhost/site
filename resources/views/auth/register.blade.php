@extends('layout')

@section('body')
    <body class="body-auth text-center vh-100">
        <main class="form-signin">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <a href="{{ route('index') }}" class="d-block mb-4">
                    <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51 51" height="57" width="57" version="1.1">
                        <g>
                            <path d="m 37,0 14.2087,0 0,50.9653 -14.2087,0 0,-4.2521 8.9707,0 0,-42.4608 -8.9707,0 0,-4.2524 z m -7.1725,18.3309 3.9311,0 0,14.3057 -3.9311,0 0,-1.1938 2.046,0 0,-11.9184 -2.046,0 0,-1.1935 z m 3.8465,-7.7636 8.1974,0 0,29.8333 -8.1974,0 0,-2.4896 4.5349,0 0,-24.8548 -4.5349,0 0,-2.4889 z"></path>
                            <path d="m 14,0 -14.2087,0 0,50.9653 14.2087,0 0,-4.2521 -8.9708,0 0,-42.4608 8.9708,0 0,-4.2524 z m 7.1725,18.3309 -3.9311,0 0,14.3057 3.9311,0 0,-1.1938 -2.046,0 0,-11.9184 2.046,0 0,-1.1935 z m -3.8465,-7.7636 -8.1981,0 0,29.8333 8.1981,0 0,-2.4896 -4.535,0 0,-24.8548 4.535,0 0,-2.4889 z"></path>
                        </g>
                    </svg>
                </a>

                <h1 class="mb-3">Регистрация</h1>

                <label for="email" class="visually-hidden">E-мail адрес</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-мail адрес" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

                <label for="name" class="visually-hidden">Имя</label>
                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Имя" value="{{ old('name') }}" required autocomplete="name">
                @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror

                <button class="btn btn-lg btn-primary mt-3" type="submit">Зарегистрироваться</button>

                <p class="mt-5 mb-3 text-muted"><a href="{{ route('login') }}">Есть аккаунт?</a></p>
            </form>
        </main>
    </body>
@endsection
