<?php

namespace App\Http\Controllers;

use App\DataTables\ThemesDataTable;
use App\Http\Requests\ThemeStoreRequest;
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


    public function store(ThemeStoreRequest $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit()
    {
        return view('pages.themes.edit');
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
