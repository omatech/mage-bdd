<?php

namespace Omatech\MageBdd\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BddLine extends Model
{
    use SoftDeletes;

    protected $table = 'bdd_lines';

    protected $fillable = [
        'type', 'text', 'lineable_type', 'lineable_id'
    ];

    public function lineable()
    {
        return $this->morphTo();
    }
}