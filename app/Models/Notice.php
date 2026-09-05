<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'body',
        'audience',
        'created_by',
        'publish_at',
        'is_active',
    ];

    protected $casts = [
        'publish_at' => 'datetime',
        'is_active'  => 'boolean',
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
