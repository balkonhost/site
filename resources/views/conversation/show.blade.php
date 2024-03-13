@extends('layout')

@section('title', "{$conversation->title} / Разговоры на балконе / Балкон.Хост")

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('conversation') }}">Разговоры на балконе</a></li>
                <li class="breadcrumb-item active" aria-current="page">Подслушать</li>
            </ol>
        </nav>

        <h1 class="mb-4">{{ $conversation->title }}</h1>
        <p>{{ $conversation->created_at->format('d.m.Y H:i') }}</p>

        <div class="row">
            <div class="col-sm-12 col-lg-9">
                {!! $conversation->description !!}
                <div class="row">
                    <div class="col">
                        @isset($prev)<a href="{{ route('conversation.show', $prev->id) }}" title="{{ $prev->title }}">← Вспомнить как все было</a>@endisset
                    </div>
                    <div class="col text-end">
                        @isset($next)<a href="{{ route('conversation.show', $next->id) }}" title="{{ $next->title }}">Узнать, что было дальше? →</a>@endisset
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3">
                <div class="bg-body-secondary p-4 pb-2">
                    <div class="h4">Участники беседы</div>
                    @foreach($conversation->participants()->get() as $participant)
                        <div class="mb-3">
                            <div class="row g-0">
                                <div class="col-3">
                                    <img src="{{ $participant->photo }}" class="img-fluid" alt="{{ $participant->name }}">
                                </div>
                                <div class="col-9">
                                    <div class="ms-3">
                                        <h6 class="card-title">{{ $participant->name }}</h6>
                                        <p class="card-text d-none">{{ $participant->name }} · {{ $participant->position }}</p>
                                        <p class="card-text">{{ $participant->position }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
