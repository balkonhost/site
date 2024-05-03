@extends('layout')

@section('title', 'История / О проекте / Конкуренты')
@section('description', 'Не понятно как так получилось, но оказалось, что в нашем не легком деле у нас есть партнеры.')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('info') }}">О проекте</a></li>
                <li class="breadcrumb-item active" aria-current="page">Партнеры</li>
            </ol>
        </nav>

        <h1 class="mb-5">Партнеры</h1>

        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="side mb-5">
                    <div class="list-group">
                        <a href="{{ route('info') }}" class="list-group-item list-group-item-action">О проекте</a>
                        <a href="{{ route('info.timeline') }}" class="list-group-item list-group-item-action">История</a>
                        <a href="{{ route('info.team') }}" class="list-group-item list-group-item-action">Наша команда</a>
                        <a href="{{ route('info.data-center') }}" class="list-group-item list-group-item-action">Дата-центр</a>
                        <a href="{{ route('info.partners') }}" class="list-group-item list-group-item-action active" aria-current="true">Партнеры</a>
                        <a href="{{ route('info.competitors') }}" class="list-group-item list-group-item-action">Конкуренты</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <p>Не понятно как так получилось, но оказалось, что в нашем не легком деле у нас есть партнеры.</p>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/partners/digi.svg" class="card-img-top p-3 w-100" alt="Digi STUDIO">
                            <div class="card-body">
                                <h5 class="card-title">Digi STUDIO</h5>
                                <p class="card-text">От того, что они наши партнеры мы им меньше не завидуем.</p>
                                <a href="https://digistudio.su/" class="card-link" target="_blank">digistudio.su</a>
                            </div>
                            <div class="card-footer">
                                <div class="small text-muted">Напросились в партнеры 2 мая 2024</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
