<?php

namespace Omatech\MageBdd\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BddDomain extends Model
{
    use SoftDeletes;

    protected $table = 'bdd_domains';

    protected $fillable = [
        'name',
    ];

    public function features()
    {
        return $this->hasMany(BddFeature::class);
    }
}