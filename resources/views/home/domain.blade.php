@extends('home')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Личный кабинет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Домены</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Список доменов</h1>

    @if(!$domains->count())

        <p>Сударь — вы ссыкун, так и не осмелились зарегистрировать у нас домен.</p>

    @else

        <table class="table table-page">
            <thead>
            <tr>
                <th scope="col">Домен</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>

            @foreach($domains as $domain)
                <tr>
                    <td class="text-nowrap">{{ $domain->name }}</td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mb-4">
            {{ $domains->links() }}
        </div>

    @endif
@endsection
