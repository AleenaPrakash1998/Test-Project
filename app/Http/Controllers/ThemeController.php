<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ThemeController extends Controller
{

    public function index(): View
    {
        return view('pages.themes.index');
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
