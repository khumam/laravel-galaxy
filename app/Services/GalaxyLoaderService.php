<?php

namespace App\Services;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

class GalaxyLoaderService
{
    /**
     * Load the list of models dynamicaly
     *
     * @return Collection
     */
    public function load(): Collection {
        $models = collect(File::allFiles(app_path()))
            ->map(function ($item) {
                $path = $item->getRelativePathName();
                $class = sprintf(
                    '\%s%s',
                    Container::getInstance()->getNamespace(),
                    strtr(substr($path, 0, strrpos($path, '.')), '/', '\\')
                );
                return $class;
            })
            ->filter(function ($class) {
                $valid = false;
                if (class_exists($class)) {
                    $reflection = new \ReflectionClass($class);
                    $valid = $reflection->isSubclassOf(Model::class) &&
                        !$reflection->isAbstract();
                }
                return $valid;
            });
        $values = $models->values()->map(fn($item) => explode('\\', $item)[count(explode('\\', $item)) - 1]);
        return $values;
    }
}
