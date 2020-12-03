@extends('main')

@section('main')
    <style>
        .card-img-top {
            height: 256px;
            object-fit: cover;
            object-position: center top;
        }
    </style>
    <div class="container my-5">
        <h1>Наши одмины</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Игнат Видавший</h5>
                        <p class="card-text">Руководитель PR-отдела</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Алексей Позняк</h5>
                        <p class="card-text">Служба подавления восстания машин</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_3.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Никита Сетевой</h5>
                        <p class="card-text">Системный администратор</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_4.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Эдуард Брехунов</h5>
                        <p class="card-text">Служба технической поддержки</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_5.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Леонид Мозгоедов</h5>
                        <p class="card-text">Просто мозговитый специалист</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_6.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Галина Особая</h5>
                        <p class="card-text">Особа приближенная к сисадмину</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_7.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Глеб Спекки</h5>
                        <p class="card-text">Начальник отдела информационных технологий</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_8.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Игнатий Фролов</h5>
                        <p class="card-text">Фронтенд-разработчик</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="/img/odmin/odmin_9.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Василий Бобиков</h5>
                        <p class="card-text">Бэкенд-разработчик</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
