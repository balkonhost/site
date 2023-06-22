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
    </div>

    <form method="POST" id="check_submit">
        @csrf
        <div class="domain" style="background: #f8f8f8; border: 1px solid #dedede;">
            <div class="container">
                <div style="padding: 30px 0;">
                    <div class="d-flex">
                        <div class="h3 text-nowrap me-5">Проверьте, свободен ли домен</div>
                        <div class="ml-5 w-100">
                            <div class="input-group">
                                <input type="text" name="domain" class="form-control" id="domain" value="{{ old('domain') }}" placeholder="Введите адрес домена" autocomplete="off">
                                <button class="btn btn-outline-secondary" type="submit">Проверить</button>
                            </div>
                        </div>
                    </div>

                    @if (old('domain'))
                        <div id="check_domain">
                            @isset($tld)
                                @if ($available)
                                    @if ($tlds->where('tld', $tld->tld)->count())
                                        <div>Домен {{ old('domain') }} доступен для регистрации.</div>
                                    @else
                                        <div>Домен {{ old('domain') }} доступен для регистрации, но не у нас.</div>
                                    @endif
                                @else
                                    <div>Вас опеределили! Домен {{ old('domain') }} уже зарегистрирован.<br>
                                        Не верите? Посмотрите сами
                                        <a href="{{ route('domain.whois', ['domain' => old('domain')]) }}"
                                           target="_blank" title="Информацию о домене {{ old('domain') }}">информацию о домене</a>.
                                    </div>
                                @endif
                            @else
                                <div>Домен {{ old('domain') }} нельзя зарегистрировать.</div>
                            @endisset
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </form>

    <div class="container my-5">
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
                            <h5 class="card-title d-inline-block">.{{ $tld->tld }}</h5>
                            <p class="card-text">
                                Регистрация {{ $tld->reg_price }} руб.<br>
                                Продление {{ $tld->renew_price }} руб.
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
