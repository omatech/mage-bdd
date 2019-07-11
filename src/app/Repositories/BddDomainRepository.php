<?php
/**
 * Created by PhpStorm.
 * User: omatech
 * Date: 5/7/19
 * Time: 13:57
 */

namespace Omatech\MageBdd\App\Repositories;

use Omatech\Mage\App\Repositories\BaseRepository;
use Omatech\MageBdd\App\Models\BddDomain;

class BddDomainRepository extends BaseRepository
{
    public function model() : String
    {
        return BddDomain::class;
    }

    public function update(array $attributes, $id)
    {
        return $this->query()->where('id', $id)->update($attributes);
    }
}