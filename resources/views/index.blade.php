@extends('main')

@section('slider')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-color: #333;">
                <div class="container">
                    <div class="carousel-caption text-left" style="background-image: url('/img/night.png'); background-position: right center; background-repeat: no-repeat; background-size: contain">
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
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
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
                    <h3>Новости и акции</h3>
                </div>
                <div class="col-md-12 col-lg-4">
                    <h3>Твитим на балконе</h3>
                    <div class="twitter-section">
                        <a class="twitter-timeline" data-lang="ru" data-height="600" data-theme="light" href="https://twitter.com/balkonhost?ref_src=twsrc%5Etfw">Tweets by balkonhost</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
