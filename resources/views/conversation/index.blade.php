@extends('layout')

@section('title', 'Разговоры на балконе / Балкон.Хост')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Разговоры на балконе</li>
            </ol>
        </nav>

        <h1 class="mb-5">Разговоры на балконе</h1>

        <div class="row">
            @foreach($conversations as $conversation)
                <div class="col-sm-12 col-lg-6">
                    <h2 class="h3"><span class="text-black-50 small">§{{ $conversation->id }}</span> <a href="{{ route('conversation.show', $conversation->id) }}">{{ $conversation->title }}</a></h2>
                    <p>{{ $conversation->created_at->format('d.m.Y H:i') }}</p>
                    <p>{{ mb_substr(strip_tags(html_entity_decode($conversation->description)), 0, 200) }}...</p>
                </div>
            @endforeach
        </div>

    </div>
@endsection
