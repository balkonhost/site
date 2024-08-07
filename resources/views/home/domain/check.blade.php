@extends('home')

@section('title', 'Проверка доступности / Домены / Личный кабинет / Балкон.Хост')
@section('description', 'Проверка доступности регистрации домена.')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Личный кабинет</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home.domain') }}">Домены</a></li>
            <li class="breadcrumb-item active" aria-current="page">Проверка занятости домена</li>
        </ol>
    </nav>

    <h1>Проверка доступности</h1>
@endsection

@section('content')

    <form method="GET" action="{{ route('home.domain.check') }}">
        <div class="card">
            <div class="card-body">
                <div class="mb-3 row g-3">
                    @error('domain')
                        <label for="domain" class="form-label">Доменное имя не доступно для регистрации</label>
                    @elseif (old('domain') ?? $domain ?? false)
                        <label for="domain" class="form-label">Доменное имя доступно для регистрации</label>
                    @else
                        <label for="domain" class="form-label">Какой домен хочешь присмотреть?</label>
                    @enderror

                    <div class="col-9">
                        <input id="domain" type="text" class="form-control @error('domain') is-invalid @enderror" name="domain" value="{{ old('domain') ?? $domain ?? '' }}" aria-describedby="domain-help" placeholder="test.ru" autofocus>
                        @error('domain')
                            <small id="domain-help" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                        @elseif ($price ?? false)
                            <small id="domain-help" class="form-text" role="alert">Стоимость регистрации {{ $price }} руб.</small>
                        @enderror
                    </div>
                    <div class="col-3">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary mb-3">Проверить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if ($price ?? false)
        <form method="POST" action="{{ route('home.domain.registration', $domain) }}">
            @csrf

            <h3 class="mt-5">Зарегистрировать на</h3>

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-fl-tab" data-bs-toggle="tab" data-bs-target="#nav-fl" type="button" role="tab" aria-controls="nav-fl" aria-selected="true">Физическое лицо</button>
                    <button class="nav-link" id="nav-ul-tab" data-bs-toggle="tab" data-bs-target="#nav-ul" type="button" role="tab" aria-controls="nav-ul" aria-selected="false">Юридическое лицо</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-fl" role="tabpanel" aria-labelledby="nav-fl-tab" tabindex="0">

                    <div class="alert alert-primary mt-4" role="alert">
                        На данный момент, регистрация доступна только для граждан РФ
                    </div>

                    <div class="row g-3 align-items-center mt-3">
                        <div class="col-3">
                            <label for="email" class="col-form-label">E-mail</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelpInline">
                            @error('email')
                                <small id="emailHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="emailHelp" class="form-text" role="alert">Адрес электронной почты администратора домена в формате RFC-822.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="emailHelpInline" class="form-text">
                                my-name@domain.name
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="phone" class="col-form-label">Телефон</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" aria-describedby="phoneHelpInline">
                            @error('phone')
                                <small id="phoneHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="phoneHelp" class="form-text" role="alert">Номер телефона администратора домена.
                                    Телефон указывается с международным кодом (включая символ +); международный код, код города и
                                    местный номер разделяются пробелами. Скобки и дефисы не допускаются.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="phoneHelpInline" class="form-text">
                                +79160000000
                            </span>
                        </div>
                    </div>

                    <hr>

                    <div class="row g-3 align-items-center mt-3">
                        <div class="col-3">
                            <label for="last_name" class="col-form-label">Фамилия</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" aria-describedby="lastNameHelpInline">
                            @error('last_name')
                                <small id="lastNameHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="lastNameHelp" class="form-text" role="alert">Фамилия администратора домена на русском языке в соответствии с паспортными данными.
                                    Для иностранцев поле содержит фамилию в оригинальном написании (при невозможности в английской транслитерации).</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="lastNameHelpInline" class="form-text">
                                Иванов
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="first_name" class="col-form-label">Имя</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" aria-describedby="firstNameHelpInline">
                            @error('first_name')
                                <small id="firstNameHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="firstNameHelp" class="form-text" role="alert">Имя администратора домена на русском языке в соответствии с паспортными данными.
                                    Для иностранцев поле содержит имя в оригинальном написании (при невозможности в английской транслитерации).</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="firstNameHelpInline" class="form-text">
                                Иван
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="middle_name" class="col-form-label">Отчество</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="middle_name" name="middle_name" value="{{ old('middle_name') }}" class="form-control @error('middle_name') is-invalid @enderror" aria-describedby="middleNameHelpInline" placeholder="не обязательно">
                            @error('middle_name')
                                <small id="middleNameHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="middleNameHelp" class="form-text" role="alert">Отчество администратора домена на русском языке в соответствии с паспортными данными.
                                    Для иностранцев поле содержит отчество в оригинальном написании (при невозможности в английской транслитерации) или остаётся пустым.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="middleNameHelpInline" class="form-text">
                                Иванович
                            </span>
                        </div>
                    </div>

                    <hr>

                    <h4>Паспорт</h4>

                    <div class="row g-3 align-items-center mt-3">
                        <div class="col-3">
                            <label for="passport_number" class="col-form-label">Серия и номер</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="passport_number" name="passport_number" value="{{ old('passport_number') }}" class="form-control @error('passport_number') is-invalid @enderror" aria-describedby="passportNumberHelpInline">
                            @error('passport_number')
                                <small id="passportNumberHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="passportNumberHelp" class="form-text" role="alert">Серия и номер паспорта.
                                    В написании римских цифр допустимо использование только латинских букв.
                                    Знак номера перед номером паспорта не ставится. Паспорта СССР (паспорта старого образца) не принимаются.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="passportNumberHelpInline" class="form-text">
                                4507 123456
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="passport_place" class="col-form-label">Кем выдан</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="passport_place" name="passport_place" value="{{ old('passport_place') }}" class="form-control @error('passport_place') is-invalid @enderror" aria-describedby="passportPlaceHelpInline">
                            @error('passport_place')
                                <small id="passportPlaceHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="passportPlaceHelp" class="form-text" role="alert">Наименование органа выдавшего паспорт.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="passportPlaceHelpInline" class="form-text">
                                123 отделением милиции г. Москвы
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="passport_date" class="col-form-label">Дата выдачи</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="passport_date" name="passport_date" value="{{ old('passport_date') }}" class="form-control @error('passport_date') is-invalid @enderror" aria-describedby="passportDateHelpInline">
                            @error('passport_date')
                                <small id="passportDateHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="passportDateHelp" class="form-text" role="alert">Дата выдачи паспорта. Дата записывается в формате ДД.ММ.ГГГГ.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="passportDateHelpInline" class="form-text">
                                25.10.2008
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="birthdate" class="col-form-label">Дата рождения</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="birthdate" name="birthdate" value="{{ old('birthdate') }}" class="form-control @error('birthdate') is-invalid @enderror" aria-describedby="birthdateHelpInline">
                            @error('birthdate')
                                <small id="birthdateHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="birthdateHelp" class="form-text" role="alert">Дата рождения администратора домена в формате ДД.ММ.ГГГГ.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="birthdateHelpInline" class="form-text">
                                25.10.1988
                            </span>
                        </div>
                    </div>

                    <hr>

                    <h4>Адрес регистрации</h4>

                    <div class="row g-3 align-items-center mt-3">
                        <div class="col-3">
                            <label for="zip_code" class="col-form-label">Почтовый индекс</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" class="form-control @error('zip_code') is-invalid @enderror" aria-describedby="zipCodeHelpInline">
                            @error('zip_code')
                                <small id="zipCodeHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="zipCodeHelp" class="form-text" role="alert">Почтовый индекс администратора домена.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="zipCodeHelpInline" class="form-text">
                                234567
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="region" class="col-form-label">Область</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="region" name="region" value="{{ old('region') }}" class="form-control @error('region') is-invalid @enderror" aria-describedby="regionHelpInline" placeholder="не обязательно">
                            @error('region')
                                <small id="regionHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="regionHelp" class="form-text" role="alert">Область из почтового адреса администратора домена.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="regionHelpInline" class="form-text">
                                Московская
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="city" class="col-form-label">Город / Населённый пункт</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="city" name="city" value="{{ old('city') }}" class="form-control @error('city') is-invalid @enderror" aria-describedby="cityHelpInline">
                            @error('city')
                                <small id="cityHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="cityHelp" class="form-text" role="alert">Название города из почтового адреса администратора домена.</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="cityHelpInline" class="form-text">
                                Москва
                            </span>
                        </div>

                        <div class="col-3">
                            <label for="address" class="col-form-label">Улица, дом, квартира</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="address" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" aria-describedby="addressHelpInline">
                            @error('address')
                                <small id="addressHelp" class="form-text invalid-feedback" role="alert">{{ $message }}</small>
                            @else
                                <small id="addressHelp" class="form-text" role="alert">Адрес включающий название улицы и номер дома (возможна доп. информация в виде номера корпуса/квартиры и т.д.).</small>
                            @enderror
                        </div>
                        <div class="col-3">
                            <span id="addressHelpInline" class="form-text">
                                ул. Ленина, дом 12, кв. 34
                            </span>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">Зарегистрировать</button>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-ul" role="tabpanel" aria-labelledby="nav-ul-tab" tabindex="0">

                    <div class="alert alert-primary mt-4" role="alert">
                        На данный момент, регистрация для юридических лиц не доступна
                    </div>

                </div>
            </div>

        </form>
    @endif
@endsection
