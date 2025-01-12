<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class GradeLevel extends Model
{
    use SoftDeletes;
    
    protected $guarded = [
        'id',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Child::class);
    }

    public function classroom(): HasOne
    {
        return $this->hasOne(Classroom::class);
    }
}
