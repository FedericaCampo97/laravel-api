<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Type extends Model
{
    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
