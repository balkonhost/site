<tr>
    <td>
        {{ $transaction->created_at->format('d.m.Y') }}<br>
        <small>{{ $transaction->created_at->format('H:i:s') }}</small>
    </td>
    <td class="text-nowrap">{{ $transaction->amount }} ₽</td>
    <td>
        @isset($transaction->meta['type'])
            @if ('refill' == $transaction->meta['type'])
                <a href="{{ route('home.balance.transaction', $transaction) }}">Пополнение баланса</a>
            @endif
        @endisset

        @isset($transaction->meta['method'])
            @if (($method = current(explode('_', $transaction->meta['method']))) && 'card' == $method)
                <br><small>Оплата на карту</small>
            @endif
        @endisset
    </td>
    <td>
        @if ($transaction->confirmed)
            Подтвержден
        @else
            Не подтвержден
        @endif
    </td>
</tr>
