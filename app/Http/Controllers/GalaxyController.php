<?php

namespace App\Http\Controllers;

use App\Services\GalaxyExecutorService;
use App\Services\ModelLoaderService;
use Illuminate\Http\Request;

class GalaxyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($galaxyModel)
    {
        return view('galaxy.index', compact('galaxyModel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($galaxyModel)
    {
        return view('galaxy.create', compact('galaxyModel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $galaxyModel, GalaxyExecutorService $galaxyExecutorService)
    {
        $act = $galaxyExecutorService->store($galaxyModel, $request);
        return $act
            ? redirect()->route('galaxy.index', $galaxyModel)->with('success', "The $galaxyModel data has successfuly added to system")
            : back()->with('error', "Failed to add new $galaxyModel");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $galaxyModel, string $id, GalaxyExecutorService $galaxyExecutorService)
    {
        $data = $galaxyExecutorService->first($galaxyModel, ['id' => $id]);
        return view('galaxy.show', compact('data', 'galaxyModel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $galaxyModel, string $id, GalaxyExecutorService $galaxyExecutorService)
    {
        $data = $galaxyExecutorService->first($galaxyModel, ['id' => $id]);
        return view('galaxy.edit', compact('data', 'galaxyModel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $galaxyModel, string $id, GalaxyExecutorService $galaxyExecutorService)
    {
        $act = $galaxyExecutorService->update($galaxyModel, $request, ['id' => $id]);
        return $act
            ? redirect()->route('galaxy.index', $galaxyModel)->with('success', "The $galaxyModel data has successfuly updated on system")
            : back()->with('error', "Failed to update $galaxyModel");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $galaxyModel, string $id, GalaxyExecutorService $galaxyExecutorService)
    {
        $act = $galaxyExecutorService->destroy($galaxyModel, ['id' => $id]);
        return $act
            ? redirect()->route('galaxy.index', $galaxyModel)->with('success', "The $galaxyModel data has successfuly deleted from system")
            : back()->with('error', "Failed to delete $galaxyModel");
    }
}
