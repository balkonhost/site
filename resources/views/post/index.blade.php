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
            @foreach($posts as $post)
                <div class="col-sm-12 col-lg-6">
                    <h2 class="h3"><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h2>
                    <p>{{ mb_substr(strip_tags(html_entity_decode($post->description)), 0, 200) }}...</p>
                    <p>{{ $post->admin ? $post->admin->name : $post->user->name }} · {{ $post->created_at->format('d.m.Y H:i') }}</p>
                </div>
            @endforeach
        </div>

    </div>
@endsection
