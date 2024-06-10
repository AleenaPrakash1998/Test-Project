@foreach(json_decode($model->menu_name) as $menuValue)
    @php
        $menuLabel = \App\Enums\ThemeMenu::from($menuValue)->label();
    @endphp
    <span class="badge bg-label-warning">{{ $menuLabel }}</span>
@endforeach
