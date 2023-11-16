<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Type extends Model
{
    public function post(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
