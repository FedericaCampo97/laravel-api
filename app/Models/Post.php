<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'slug', 'cover_image', 'content', 'type_id'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(Technology::class, 'project_technology', 'technology_id', 'project_id');
    }
}
