@extends('layout')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Домены</li>
            </ol>
        </nav>

        <h1>Регистрация доменов</h1>
        <p class="text-muted mb-5">По безбожно высоким ценам в {{ $tlds->count() }} {{ trans_choice('зоне|зонах|зонах', $tlds->count()) }}.</p>

        <p>Мы создаем видимость, что самостоятельно регистрируем домены во всех популярных зонах в соответствии со
            всеми нормами и правилами регистрации доменных имен, но на самом деле мы делаем это через других
            регистраторов, например: REG.RU, RU-CENTER или R01.</p>

        <p>Регистрируя домен через нас – вы помогаете нам зарабатывать на этом, благодаря имеющимся партнерским скидкам.

            Вы же, в свою очередь, делаете это на свой стрях и риск, да и стоимость регистрации возможно получается
            для вас дороже, чем если бы делали это на прямую.</p>

        <ul class="list-advantage">
            <li>К сожалению для нас, скрытие персональных данных в whois – бесплатно и по-умолчанию активно.</li>
            <li>Никаго бесплатного DNS-хостинга для настройки MX, A, CNAME записей</li>
            <li>Никакого целостного подхода. Мы не предоставим вам полный комплекс услуг в одном месте: хостинг, домен, техническую поддержку, администрирование.</li>
            <li>Никакой консультации технической поддержки.</li>
            <li>Мы постоянно забываем уведомить об окончании срока регистрации домена.</li>
            <li>Нет никакой гарантии низких цен на продление на все время пользования доменом.</li>
        </ul>


        <h2 class="mt-5">Цены на регистрацию доменов</h2>
            <p>
                Доступна регистрация доменов в {{ $tlds->count() }}
                {{ trans_choice('зоне|зонах|зонах', $tlds->count()) }}.
            </p>

            <div class="row row-cols-1 row-cols-md-5 g-4 mb-5">
                @foreach($tlds as $tld)
                    <div class="col">
                        <div class="card h-100">
                            <!--img src="..." class="card-img-top" alt="..."-->
                            <div class="card-body">
                                <input type="checkbox" class="form-check-input" name="tld[{{ $tld->tld }}]">
                                <h5 class="card-title d-inline-block">.{{ $tld->tld }}</h5>
                                <p class="card-text">
                                    Регистрация {{ $tld->reg_price }} руб.<br>
                                    Продление {{ $tld->renew_price }} руб.
                                </p>
                            </div>
                                <div class="precents">
                                    <span>-22%</span>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>


    </div>
@endsection
