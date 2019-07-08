<?php
/**
 * Created by PhpStorm.
 * User: omatech
 * Date: 5/7/19
 * Time: 13:57
 */

namespace Omatech\MageBdd\App\Repositories;

use Omatech\Mage\App\Repositories\BaseRepository;
use Omatech\MageBdd\App\Models\BddLine;

class BddLineRepository extends BaseRepository
{
    public function model() : String
    {
        return BddLine::class;
    }
}