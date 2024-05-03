@extends('layout')

@section('title', 'История / О проекте / Конкуренты')
@section('description', 'Встречаем наших конкурентов, которых мы тихо ненавидим и про себя обливаем грязью.')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('info') }}">О проекте</a></li>
                <li class="breadcrumb-item active" aria-current="page">Конкуренты</li>
            </ol>
        </nav>

        <h1 class="mb-5">Конкуренты</h1>

        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="side mb-5">
                    <div class="list-group">
                        <a href="{{ route('info') }}" class="list-group-item list-group-item-action">О проекте</a>
                        <a href="{{ route('info.timeline') }}" class="list-group-item list-group-item-action">История</a>
                        <a href="{{ route('info.team') }}" class="list-group-item list-group-item-action">Наша команда</a>
                        <a href="{{ route('info.data-center') }}" class="list-group-item list-group-item-action">Дата-центр</a>
                        <a href="{{ route('info.partners') }}" class="list-group-item list-group-item-action">Партнеры</a>
                        <a href="{{ route('info.competitors') }}" class="list-group-item list-group-item-action active" aria-current="true">Конкуренты</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <p>Тут собраны проекты, которые в разное время попались нам под руку и вызвали у нас жесткое чувство зависти и собственной неполноценности.
                    Если вы пройдетесь по их сайтам, то сможете самостоятельно убедится в том, как они нагло и не краснея размещают у себя на сайтах, то что мы у них слизали.</p>
                <p>Встречаем наших конкурентов, которых мы тихо ненавидим и про себя обливаем грязью.</p>

                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/konkurenty/fast-fox.png" class="card-img-top p-3 w-100" alt="FastFox">
                            <div class="card-body">
                                <h5 class="card-title">FastFox</h5>
                                <p class="card-text">Их бесячая оранжевая лисичка нам сразу не понравилась...</p>
                                <a href="https://fastfox.pro/" class="card-link" target="_blank">fastfox.pro</a>

                            </div>
                            <div class="card-footer">
                                <div class="small text-muted">Тихо ненавидим с 22 января 2019</div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/konkurenty/webhost1.svg" class="card-img-top p-3 w-100" alt="WebHOST1">
                            <div class="card-body">
                                <h5 class="card-title">WebHOST1</h5>
                                <p class="card-text">Персонаж у них прикольный, но от этого не еще более бесячий...</p>
                                <a href="https://webhost1.ru/" class="card-link" target="_blank">webhost1.ru</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/konkurenty/eternalhost.svg" class="card-img-top p-3 w-100" alt="Eternalhost">
                            <div class="card-body">
                                <h5 class="card-title">Eternalhost</h5>
                                <p class="card-text">Грёбаный Экибастуз...</p>
                                <a href="https://eternalhost.net/" class="card-link" target="_blank">eternalhost.net</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/konkurenty/fornex.svg" class="card-img-top p-3 w-100" alt="FORNEX">
                            <div class="card-body">
                                <h5 class="card-title">FORNEX</h5>
                                <p class="card-text">Международный хостинг с более чем 10 летней историей... Красиво заливают.</p>
                                <a href="https://fornex.com/ru/" class="card-link" target="_blank">fornex.com</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
