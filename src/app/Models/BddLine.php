<?php

namespace Omatech\MageBdd\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BddLine extends Model
{
    use SoftDeletes;

    protected $table = 'bdd_lines';

    protected $fillable = [
        'type', 'text', 'bdd_scenario_id'
    ];

    public function scenario()
    {
        return $this->belongsTo(BddScenario::class);
    }

    public function scopeGivenLine($query)
    {
        return $query->where('type', 'given');
    }

    public function scopeWhenLine($query)
    {
        return $query->where('type', 'when');
    }

    public function scopeThenLine($query)
    {
        return $query->where('type', 'then');
    }
}