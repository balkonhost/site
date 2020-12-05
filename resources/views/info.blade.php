@extends('main')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">О проекте</li>
            </ol>
        </nav>

        <h1 class="mb-5">О проекте</h1>
        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="side mb-5">
                    <div class="list-group">
                        <a href="{{ route('info') }}" class="list-group-item list-group-item-action active" aria-current="true">О проекте</a>
                        <a href="{{ route('team') }}" class="list-group-item list-group-item-action">Наша команда</a>
                        <a href="{{ route('data-center') }}" class="list-group-item list-group-item-action">Дата-центр</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <img src="/img/info/about.jpg" class="img-fluid" alt="">
                <h2 class="h3 mt-3">У нас как в дружном детсадовском коллективе.</h2>

                <p>Да, по сути, так и есть. </p>
            </div>
        </div>
    </div>
@endsection
