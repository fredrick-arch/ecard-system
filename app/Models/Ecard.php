<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ecard extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'recipient_name',
        'recipient_phone',
        'image_path',
        'custom_data',
        'is_sent',
        'sent_at',
    ];

    protected $casts = [
        'custom_data' => 'array',
        'is_sent' => 'boolean',
        'sent_at' => 'datetime',
    ];

    public function scopeForUser(Builder $query)
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            $query->where('user_id', auth()->id());
        }
    }

    // relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}