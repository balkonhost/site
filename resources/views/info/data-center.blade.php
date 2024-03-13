@extends('layout')

@section('title', 'Дата-центр / О проекте / Балкон.Хост')

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
                        <a href="{{ route('info.team') }}" class="list-group-item list-group-item-action">Наша команда</a>
                        <a href="{{ route('info.data-center') }}" class="list-group-item list-group-item-action active" aria-current="true">Дата-центр</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div id="slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="6" aria-label="Slide 7"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="7" aria-label="Slide 8"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="8" aria-label="Slide 9"></button>
                        <button type="button" data-bs-target="#slider" data-bs-slide-to="9" aria-label="Slide 10"></button>
                    </div>

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

                    <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
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
