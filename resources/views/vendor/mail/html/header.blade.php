@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === settings()->group('umum')->get('app_nama'))
<img src="{{ asset(settings()->group('umum')->get('app_logo')) }}" class="logo" alt="Mydes">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
