<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todos extends Model
{
    use HasFactory;

    // Xác định mối quan hệ n-1 với table user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'name',
        'status',
        'tags',
        'start_date',
        'note',
        'des',
        'user_id'
    ];
}
