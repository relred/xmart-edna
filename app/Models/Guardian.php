<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function children(): BelongsToMany
    {
        return $this->belongsToMany(Child::class)
                    ->withPivot('relationship_type');
    }
}
