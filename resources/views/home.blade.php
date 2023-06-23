@extends('layout')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Личный кабинет</li>
            </ol>
        </nav>

        <h1>Привет {{ auth()->user()->name }}!</h1>
        <p>У которого на счете {{ auth()->user()->balance }} ₽. <a href="{{ route('home.balance') }}" title="История операций">Глянем</a> как так вышло?</p>
    </div>
@endsection
