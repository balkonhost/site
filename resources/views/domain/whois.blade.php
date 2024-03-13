@extends('layout')

@section('main')
    <style>
        pre {
            white-space: pre-wrap;
            white-space: -moz-pre-wrap;
            white-space: -pre-wrap;
            white-space: -o-pre-wrap;
            word-wrap: break-word;
        }
    </style>
    <div class="container my-5">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('domain') }}">Домены</a></li>
                @isset($whois)
                    <li class="breadcrumb-item"><a href="{{ route('domain.whois') }}">Whois-сервис</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $whois->domain }}</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">Whois-сервис</li>
                @endisset
            </ol>
        </nav>

        @isset($whois)
            <h1 class="mb-5">Информация о домене — {{ $whois->domain }}</h1>
            <form>
                <div class="form-inline">
                    <div class="form-group mr-sm-3 mb-2">
                        <label for="domain" class="sr-only">Введите адрес домена</label>
                        <input type="text" class="form-control" name="domain" value="{{ $whois->domain }}" placeholder="Введите адрес домена">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Получить информацию</button>
                </div>
            </form>
            <pre class="mt-4">{{ $whois->text }}</pre>
        @else
            <h1 class="mb-5">Информация о доменах — Whois-сервис</h1>
            <form>
                <div class="form-inline">
                    <div class="form-group mr-sm-3 mb-2">
                        <label for="domain" class="sr-only">Введите адрес домена</label>
                        <input type="text" class="form-control" name="domain" placeholder="Введите адрес домена">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Получить информацию</button>
                </div>
            </form>
        @endisset
    </div>
@endsection
