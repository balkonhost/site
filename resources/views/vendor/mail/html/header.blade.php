<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@elseif(trim($slot) === 'Балкон.Хост')
<img src="{{ env('MAIL_LOGO','https://www.balkon.host/img/notification-logo.png') }}" class="logo" alt="Balkon.host Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
