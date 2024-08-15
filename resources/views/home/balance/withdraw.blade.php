@extends('home')

@section('title', 'Списание / Баланс / Личный кабинет / Балкон.Хост')
@section('description', 'Как бы списание баланса.')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Личный кабинет</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home.balance') }}">Баланс</a></li>
            <li class="breadcrumb-item active" aria-current="page">Списание</li>
        </ol>
    </nav>

    <h1>Списание</h1>
@endsection

@section('content')
    Списание
@endsection
