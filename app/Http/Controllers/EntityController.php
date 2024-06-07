<?php

namespace App\Http\Controllers;

use App\DataTables\EntitiesDataTable;
use Illuminate\Http\Request;

class EntityController extends Controller
{

    public function index(EntitiesDataTable $dataTable)
    {
//        return view('pages.entities.index');
        return $dataTable->render('pages.entities.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
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
