<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $description
 * @property bool $published
 * @property  string $created_at
 */

class Post extends Model
{

    use SoftDeletes;

    //BelongsTo while we have category_id in posts table
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    //HasMany while we have post_id in post_images table
    public function images(): HasMany
    {
        return $this ->hasMany(PostImage::class);
    }

    // HasOne wihle we have HasMany but with condition
    public function image(): HasOne
    {
        return $this->hasOne(PostImage::class)->ofMany('sort', 'MIN');
    }
}

