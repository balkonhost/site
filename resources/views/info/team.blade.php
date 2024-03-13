@extends('layout')

@section('title', 'Команда / О проекте / Балкон.Хост')

@section('main')
    <style>
        .card-img-top {
            height: 384px;
            object-fit: cover;
            object-position: center top;
        }
    </style>

    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('info') }}">О проекте</a></li>
                <li class="breadcrumb-item active" aria-current="page">Команда</li>
            </ol>
        </nav>

        <h1 class="mb-5">Наша команда одминов</h1>

        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="side mb-5">
                    <div class="list-group">
                        <a href="{{ route('info') }}" class="list-group-item list-group-item-action">О проекте</a>
                        <a href="{{ route('info.team') }}" class="list-group-item list-group-item-action active" aria-current="true">Наша команда</a>
                        <a href="{{ route('info.data-center') }}" class="list-group-item list-group-item-action">Дата-центр</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach($admins as $admin)
                        <div class="col">
                            <div class="card">
                                <img src="{{ $admin->photo }}" class="card-img-top" alt="{{ $admin->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $admin->name }}</h5>
                                    <p class="card-text">{{ $admin->position }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
