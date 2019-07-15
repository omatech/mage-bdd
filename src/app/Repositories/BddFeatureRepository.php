<?php
/**
 * Created by PhpStorm.
 * User: omatech
 * Date: 5/7/19
 * Time: 13:57
 */

namespace Omatech\MageBdd\App\Repositories;

use Omatech\Mage\App\Repositories\BaseRepository;
use Omatech\MageBdd\App\Http\Resources\BddFeatureResource;
use Omatech\MageBdd\App\Models\BddFeature;

class BddFeatureRepository extends BaseRepository
{
    public function model() : String
    {
        return BddFeature::class;
    }

    public function find($id, $columns = '*')
    {
        return $this->query()->find($id, $columns);
    }


    public function findResource($id)
    {
        $feature = $this->query()->find($id);

        return new BddFeatureResource($feature);
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