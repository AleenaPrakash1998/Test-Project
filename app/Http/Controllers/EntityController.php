<?php

namespace App\Http\Controllers;

use App\DataTables\EntitiesDataTable;
use App\Models\Entity;
use App\Models\Theme;
use Illuminate\Http\Request;

class EntityController extends Controller
{

    public function index(EntitiesDataTable $dataTable)
    {
        $themes = Theme::query()->get();

        return $dataTable->render('pages.entities.index', compact('themes'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Entity $entity)
    {
        return response()->json($entity);
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
