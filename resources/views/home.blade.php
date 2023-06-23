@extends('layout')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Личный кабинет</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Привет {{ auth()->user()->name }}!</h1>
    <p>У которого на счете {{ auth()->user()->balance }} ₽. <a href="{{ route('home.balance') }}" title="История операций">Глянем</a> как так вышло?</p>
@endsection

@section('main')
    <div class="container my-5">

        @yield('breadcrumb')

        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="side mb-5">
                    <div class="list-group">

                        @if (Route::has('home.balance'))
                            @if (Route::is('home.balance*'))
                                <a href="{{ route('home.balance') }}" class="list-group-item list-group-item-action active" aria-current="true">Баланс</a>
                            @else
                                <a href="{{ route('home.balance') }}" class="list-group-item list-group-item-action">Баланс</a>
                            @endif
                        @endif

                        @if (Route::has('home.domain'))
                            @if (Route::is('home.domain*'))
                                <a href="{{ route('home.domain') }}" class="list-group-item list-group-item-action active" aria-current="true">Домены</a>
                            @else
                                <a href="{{ route('home.domain') }}" class="list-group-item list-group-item-action">Домены</a>
                            @endif
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">

                @yield('content')

            </div>
        </div>
    </div>
@endsection


