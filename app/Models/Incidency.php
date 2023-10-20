<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Incidency extends Model
{
    use HasFactory;

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
}
