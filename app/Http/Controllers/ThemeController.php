<?php

namespace App\Http\Controllers;

use App\DataTables\ThemesDataTable;
use App\Http\Requests\ThemeStoreRequest;
use App\Http\Requests\ThemeUpdateRequest;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ThemeController extends Controller
{

    public function index(ThemesDataTable $dataTable)
    {
        return $dataTable->render('pages.themes.index');
    }


    public function create(): View
    {
        return view('pages.themes.create');
    }


    public function store(ThemeStoreRequest $request): RedirectResponse
    {
        $data = $request->all();

        $data['menu_name'] = json_encode($request->input('menu_name'));

        $theme = Theme::create($data);

        if ($request->hasFile('logo')) {
            $theme->addMediaFromRequest('logo')
                ->toMediaCollection('logos');
        }

        if ($request->hasFile('banner_image')) {
            $theme->addMediaFromRequest('banner_image')
                ->toMediaCollection('banners');
        }

        $theme->is_default = $request->has('is_default');

        return redirect()->route('themes.index')->with('success', 'Theme created successfully.');
    }

    public function edit(Theme $theme): View
    {
        return view('pages.themes.edit', compact('theme'));
    }


    public function update(ThemeUpdateRequest $request, string $id): RedirectResponse
    {
        $theme = Theme::findOrFail($id);

        $data = $request->all();
        $data['menu_name'] = json_encode($request->input('menu_name'));

        $theme->fill($data);
        $theme->is_default = $request->has('is_default');
        $theme->save();


        if ($request->hasFile('logo')) {
            $theme->clearMediaCollection('logos');
            $theme->addMediaFromRequest('logo')->toMediaCollection('logos');
        }

        if ($request->hasFile('banner_image')) {
            $theme->clearMediaCollection('banners');
            $theme->addMediaFromRequest('banner_image')->toMediaCollection('banners');
        }

        return redirect()->route('themes.index')->with('success', 'Theme updated successfully.');
    }

}
