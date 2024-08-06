@extends('home')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Личный кабинет</li>
        </ol>
    </nav>

    <h1>Привет {{ auth()->user()->name }}!</h1>
@endsection

@section('content')
    <p>У которого на счете {{ auth()->user()->balance }} ₽. <a href="{{ route('home.balance') }}" title="История операций">Глянем</a> как так вышло?</p>
@endsection
