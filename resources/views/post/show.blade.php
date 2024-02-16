@extends('layout')

@section('title', 'Разговоры на балконе / Балкон.Хост')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('post') }}">Разговоры на балконе</a></li>
                <li class="breadcrumb-item active" aria-current="page">Присоседиться</li>
            </ol>
        </nav>

        <h1 class="mb-5">{{ $post->title }}</h1>
        {!! $post->description !!}
    </div>
@endsection
