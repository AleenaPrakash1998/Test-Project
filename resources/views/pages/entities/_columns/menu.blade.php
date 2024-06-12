@if ($model->theme && $model->theme->menu_name)
    @foreach (json_decode($model->theme->menu_name) as $menuName)
        <span class="badge bg-label-warning">{{ $menuName }}</span>
    @endforeach
@endif
