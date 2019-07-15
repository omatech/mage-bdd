<?php

namespace Omatech\MageBdd\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BddFeature extends Model
{
    use SoftDeletes;

    protected $table = 'bdd_features';

    protected $fillable = [
        'title',
        'color',
        'bdd_domain_id'
    ];

    public function domain()
    {
        return $this->belongsTo(BddDomain::class);
    }

    public function scenarios()
    {
        return $this->hasMany(BddScenario::class);
    }

    public function lines()
    {
        return $this->morphMany(BddLine::class, 'lineable');
    }
}