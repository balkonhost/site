@extends('home')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Личный кабинет</a></li>
            <li class="breadcrumb-item active" aria-current="page">Баланс</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Список операций</h1>
    @if(!$transactions->count())

        <p>Сударь — вы жмот, так как еще ни разу не пополняли свой баланс.</p>

    @else

        <table class="table table-page">
            <thead>
            <tr>
                <th scope="col">Дата</th>
                <th scope="col">Сумма</th>
                <th scope="col">Описание</th>
            </tr>
            </thead>
            <tbody>

            @foreach($transactions as $transaction)
                <tr>
                    <td>
                        {{ $transaction->created_at->format('d.m.Y') }}<br>
                        <small>{{ $transaction->created_at->format('H:i:s') }}</small>
                    </td>
                    <td class="text-nowrap">{{ $transaction->amount }} ₽</td>
                    <td>
                        @isset($transaction->meta['description'])
                            {{ $transaction->meta['description'] }}
                            @isset($transaction->meta['comment'])
                                <br><small>{{ $transaction->meta['comment'] }}</small>
                            @endisset
                        @endisset
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-end mb-4">
            {{ $transactions->links() }}
        </div>

    @endif
@endsection
