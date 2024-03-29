<?php

namespace Omatech\MageBdd\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BddScenario extends Model
{
    use SoftDeletes;

    protected $table = 'bdd_scenarios';

    protected $fillable = [
        'title',
        'bdd_feature_id'
    ];

    public function feature()
    {
        return $this->belongsTo(BddFeature::class);
    }

    public function lines()
    {
        return $this->hasMany(BddLine::class);
    }
}