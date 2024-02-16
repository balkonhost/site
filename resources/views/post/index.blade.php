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

        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($posts as $post)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></p>
                                <footer class="blockquote-footer">{{ mb_substr(strip_tags(html_entity_decode($post->description)), 0, 200) }}...</footer>
                            </blockquote>
                        </div>
                        <div class="card-footer">
                            {{ $post->admin ? $post->admin->name : $post->user->name }} · {{ $post->created_at->format('d.m.Y H:i') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
