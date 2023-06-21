<?php

namespace App\Services;
use Illuminate\Http\Request;

class GalaxyExecutorService
{
    /**
     * Get first data from database dynamicaly
     *
     * @param  mixed $galaxyModel
     * @param  mixed $conditions
     * @return void
     */
    public function first(string $galaxyModel, array $conditions, array $relations = [])
    {
        $model = new("\\App\\Models\\$galaxyModel");
        return count($relations) ? $model::where($conditions)->with($relations)->first() : $model::where($conditions)->first();
    }

    /**
     * Get data from database dynamicaly
     *
     * @param  mixed $galaxyModel
     * @param  mixed $conditions
     * @param  mixed $relations
     * @return void
     */
    public function get(string $galaxyModel, array $conditions, array $relations = [])
    {
        $model = new("\\App\\Models\\$galaxyModel");
        return count($relations) ? $model::where($conditions)->with($relations)->get() : $model::where($conditions)->get();
    }

    /**
     * Store data into database dynamicaly
     *
     * @param  mixed $request
     * @param  mixed $galaxyModel
     * @return void
     */
    public function store(string $galaxyModel, Request $request)
    {
        $model = new ("\\App\\Models\\$galaxyModel");
        $fillable = $model->getFillable();
        $data = [];
        foreach($fillable as $item) {
            $data[$item] = $request->$item;
        }
        return $model::create($data);
    }

    /**
     * Update data from database dynamicaly
     *
     * @param  mixed $galaxyModel
     * @param  mixed $request
     * @param  mixed $conditions
     * @return void
     */
    public function update(string $galaxyModel, Request $request, array $conditions)
    {
        $model = new ("\\App\\Models\\$galaxyModel");
        $fillable = $model->getFillable();
        $data = [];
        foreach($fillable as $item) {
            $data[$item] = $request->$item;
        }
        return $model::where($conditions)->update($data);
    }

    /**
     * Delete data from database dynamicaly
     *
     * @param  mixed $galaxyModel
     * @param  mixed $conditions
     * @return void
     */
    public function destroy(string $galaxyModel, array $conditions)
    {
        $model = new ("\\App\\Models\\$galaxyModel");
        return $model::where($conditions)->delete();
    }
}
