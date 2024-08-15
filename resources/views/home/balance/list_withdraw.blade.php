<tr>
    <td>
        {{ $transaction->created_at->format('d.m.Y') }}<br>
        <small>{{ $transaction->created_at->format('H:i:s') }}</small>
    </td>
    <td class="text-nowrap">{{ $transaction->amount }} ₽</td>
    <td>
        @if (!$transaction->confirmed)
            <a href="{{ route('home.balance.transaction', $transaction) }}" title="Подробнее">
        @endif
        @isset($transaction->meta['type'])
            @if('newal' == $transaction->meta['type'])
                @isset($transaction->meta['domain'])
                    Регистрация домена {{ $transaction->meta['domain'] }}
                @endisset
            @elseif('renewal' == $transaction->meta['type'])
                @isset($transaction->meta['domain'])
                    Продление домена {{ $transaction->meta['domain'] }}
                @endisset
            @endif
        @endisset
        @if (!$transaction->confirmed)
            </a>
        @endif
    </td>
    <td>
        @if ($transaction->confirmed)
            Подтвержден
        @else
            Не подтвержден
        @endif
    </td>
</tr>
