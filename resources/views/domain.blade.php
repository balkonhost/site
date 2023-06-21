@extends('layout')

@section('main')
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item active" aria-current="page">Домены</li>
            </ol>
        </nav>

        <h1 class="mb-5">Регистрация доменов</h1>

        <div class="container">
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
    </div>
@endsection
