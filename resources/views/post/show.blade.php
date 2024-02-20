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

        <h1 class="mb-4">{{ $post->title }}</h1>

        <div class="row">
            <div class="col-sm-12 col-lg-9">
                {!! $post->description !!}
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="bg-body-secondary p-4 pb-2">
                    <img src="{{ $post->admin->photo }}" class="img-fluid mb-3" alt="{{ $post->admin->name }}">
                    <p>{{ $post->created_at->format('d.m.Y H:i') }}</p>
                    <p>{{ $post->admin->name }} · {{ $post->admin->position }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
