<?php

namespace Omatech\MageBdd\App\Repositories;

use Omatech\Mage\App\Repositories\BaseRepository;
use Omatech\MageBdd\App\Http\Resources\BddLineResource;
use Omatech\MageBdd\App\Models\BddLine;

class BddLineRepository extends BaseRepository
{
    public function model() : String
    {
        return BddLine::class;
    }

    public function find($id, $columns = '*')
    {
        return $this->query()->find($id, $columns);
    }


    public function findResource($id)
    {
        $line = $this->query()->find($id);

        return new BddLineResource($line);
    }

    public function update(array $attributes, $id)
    {
        return $this->query()->where('id', $id)->update($attributes);
    }

    public function create($attributes)
    {
        return $this->query()->create($attributes);
    }
}