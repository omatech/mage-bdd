<?php

namespace Omatech\MageBdd\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BddMeeting extends Model
{
    use SoftDeletes;

    protected $table = 'bdd_scenarios';

    protected $fillable = [
        'title',
    ];

    public function domains()
    {
        return $this->hasMany(BddDomain::class);
    }
}