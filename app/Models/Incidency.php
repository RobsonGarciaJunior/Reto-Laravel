<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incidency extends Model
{
    use HasFactory;

    //BELONGS
    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function Department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'departmentId');
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function Priority(): BelongsTo
    {
        return $this->belongsTo(Priority::class, 'priorityId');
    }

    public function State(): BelongsTo
    {
        return $this->belongsTo(State::class, 'stateId');
    }

    //HAS MANY
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'incidencyId');
    }
}
