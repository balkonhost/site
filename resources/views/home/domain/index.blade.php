@extends('home.index')

@section('title', 'Домены / Личный кабинет / Балкон.Хост')
@section('description', 'Информация о зарегистрированных доменах.')

@section('header')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Личный кабинет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Домены</li>
        </ol>
    </nav>

    <h1>Список доменов</h1>
@endsection

@section('menu')
    @parent

    <div class="d-grid gap-2 mt-3">
        <a href="{{ route('home.domain.check') }}" class="btn btn-light">Зарегистрировать новый</a>
    </div>
@endsection

@section('content')
    @if(!$domains->count())

        <p>Ты — ссыкун, который так и не осмелился зарегистрировать у нас домен.</p>

    @else
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Домен</th>
                    <th scope="col">Действует до</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach($domains as $domain)
                    <tr>
                        <td class="text-nowrap">{{ $domain->domain }}</td>
                        <td>{{ $domain->expiration_date }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mb-4">
            {{ $domains->links() }}
        </div>

        <div class="d-flex justify-content-end mb-4">
            {{ $domains->links() }}
        </div>

    @endif
@endsection
