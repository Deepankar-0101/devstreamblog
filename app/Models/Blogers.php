<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Blog;
class Blogers extends Model
{
    /** @use HasFactory<\Database\Factories\BlogersFactory> */
    use HasFactory;
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
