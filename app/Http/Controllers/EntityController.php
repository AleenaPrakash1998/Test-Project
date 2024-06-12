<?php

namespace App\Http\Controllers;

use App\DataTables\EntitiesDataTable;
use App\Http\Requests\EntityUpdateRequest;
use App\Models\Entity;
use App\Models\Theme;
use Illuminate\Http\JsonResponse;
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


    public function update(EntityUpdateRequest $request, string $id): JsonResponse
    {
        $entity = Entity::query()->findOrFail($id);

        $entity->fill($request->all());

        $entity->save();

        return response()->json(['success' => true]);
    }


    public function destroy(string $id)
    {
        //
    }
}
