@extends('layout')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('info') }}">О проекте</a></li>
                <li class="breadcrumb-item active" aria-current="page">Дата-центр</li>
            </ol>
        </nav>

        <h1 class="mb-5">Дата-центр</h1>

        <div class="row">
            <div class="col-md-12 col-lg-3">
                <div class="side mb-5">
                    <div class="list-group">
                        <a href="{{ route('info') }}" class="list-group-item list-group-item-action">О проекте</a>
                        <a href="{{ route('team') }}" class="list-group-item list-group-item-action">Наша команда</a>
                        <a href="{{ route('data-center') }}" class="list-group-item list-group-item-action active" aria-current="true">Дата-центр</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/data-center/datacheap/data_center_1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_3.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_4.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_5.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_6.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_7.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_8.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_9.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/data-center/datacheap/data_center_10.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>

                <h2 class="h3 mt-3">Вы все еще считаете, что мы размещаем сервера в дата-центрах?</h2>
                <p>Спешим вас огорчить. Оборудования, необходимого для нормального функционирования проекта,
                    у нас просто нет, а то что есть, мы размещаем где попало. Современными дата-центрами уровня TIER III,
                    сертифицированными по стандарту PCI-DSS, в таких местах вообще не пахнет.
                </p>

                <h4 class="mt-5">Наши <span class="text-decoration-line-through">плюсы и</span> минусы.</h4>
                <ul class="list-group">
                    <li class="list-group-item">У нас нет дата-центра, расположенного в отдельностоящем здании на закрытой охраняемой территории.</li>
                    <li class="list-group-item">Нет нормального электропитания. Сопля и коротыш — никуда не убежишь.</li>
                    <li class="list-group-item">Кондиционирование — это для слабаков, а мы не такие.</li>
                    <li class="list-group-item">Подключение ко всем основным точкам обмена трафика? Это вообще что такое? Витая пара на окно — это наше все.</li>
                </ul>
            </div>
        </div>

    </div>
@endsection
