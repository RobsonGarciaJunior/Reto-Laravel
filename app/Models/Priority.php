<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Priority extends Model
{
    use HasFactory;
    
    //HAS MANY
    public function incidencies(): HasMany
    {
        return $this->hasMany(Incidency::class, 'priorityId');
    }
}
