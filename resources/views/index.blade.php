@extends('layout')

@section('slider')
    <div class="slider">
        <div id="slider" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#slider" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-color: #c00;">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1 class="carousel-title">Вам надоело, что у вас все стабильно работает, скучаете по бессоным ночам, потерянным архивам? Наш хостинг поможет вам вспомнить все.</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-item_warranty">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1 class="carousel-title">Мы гарантируем,<br> что кошмарнее хостинга<br> вы еще не видели.</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="background-color: #c00;">
                    <div class="container">
                        <div class="carousel-caption text-left" style="background-image: url('/img/rkn.png'); background-position: right center; background-repeat: no-repeat; background-size: 185px">
                            <h1 class="carousel-title">Наши IP-адреса в топе Роскомнадзора,<br> поэтому нет причин переживать,<br> клиенты вас не заметят.</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item carousel-item_warranty">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1 class="carousel-title">Наша поддержка - старшеклассники и студенты, отчисленные после первого курса. Если ответят, то могут и послать</h1>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection

@section('main')
    <div class="container">
        <h2>Почему ваш сайт будет не только медленно работать, но и часто падать?</h2>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="h5">Восcтановленные сервера</div>
                <p>Мы используем только восстановленные сервера и сопутствующее оборудование.
                    Честно говоря, сами удивляемся, что это «железо» все еще работает.</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="h5">Отсутсвие SSD и RAID</div>
                <p>Мы используем только «проверенные временем» изношенные жёсткие диски и
                    обходим стороной твердотельные или гибридные накопители.</p>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="h5">Никаких гарантий</div>
                <p>Мы отказываемся от любых гарантий. В любой момент все может сломаться и
                    ваши данные будут уничтожены. Архивные копии, скорее всего, будут не рабочие.</p>
            </div>
        </div>
    </div>
    <div style="background: #f8f9fb; border-bottom: 1px solid #eff1f5;border-top: 1px solid #eff1f5;" class="py-5">
        <div class="container">
            <h3>О нас боятся писать</h3>
            <p>Писать о нас некому, да и не чего.</p>
        </div>
    </div>
    <div style="border-bottom: 1px solid #eff1f5;" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <h3>Разговоры на балконе</h3>
                    <div class="post-section">
                        @foreach($conversations as $conversation)
                            <div class="col-sm-12 col-lg-6">
                                <h2 class="h3"><span class="text-black-50 small">§{{ $conversation->id }}</span> <a href="{{ route('conversation.show', $conversation->id) }}">{{ $conversation->title }}</a></h2>
                                <p>{{ $conversation->created_at->format('d.m.Y H:i') }}</p>
                                <p>{{ mb_substr(strip_tags(html_entity_decode($conversation->description)), 0, 200) }}...</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <h3>Запретили твитить на балконе</h3>
                    <div class="twitter-section">
                        <a href="https://twitter.com/balkonhost" title="Tweets by balkonhost">
                            <img src="/img/twitter-forbidden.jpg" class="img-fluid" alt="Tweets forbidden">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="background: #f8f9fb; border-bottom: 1px solid #eff1f5;" class="py-5">
        <div class="container">
            <h3>Наши клиенты</h3>
            <p>«Нет клиентов — нет проблем!» - это любимая фраза нашего основателя. Мы так рады что у нас нет ни одного клиента.</p>
        </div>
    </div>
@endsection
