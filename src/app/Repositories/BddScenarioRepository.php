<?php
/**
 * Created by PhpStorm.
 * User: omatech
 * Date: 5/7/19
 * Time: 13:57
 */

namespace Omatech\MageBdd\App\Repositories;

use Omatech\Mage\App\Repositories\BaseRepository;
use Omatech\MageBdd\App\Http\Resources\BddScenarioResource;
use Omatech\MageBdd\App\Models\BddScenario;

class BddScenarioRepository extends BaseRepository
{
    public function model() : String
    {
        return BddScenario::class;
    }

    public function find($id, $columns = '*')
    {
        return $this->query()->find($id, $columns);
    }


    public function findResource($id)
    {
        $scenario = $this->query()->find($id);

        return new BddScenarioResource($scenario);
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