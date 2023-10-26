<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    //BELONGS
    public function Incidency(): BelongsTo
    {
        return $this->belongsTo(Incidency::class, 'incidencyId');
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
