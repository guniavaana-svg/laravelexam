<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 * @property boolean $is_active
 * @property string $created_at
 * @property string $update_at
 */
class Category extends Model
{
    //HasMany while we have category_id in posts table
    public function posts():HasMany
    {
        return  $this->hasMany(Post::class);
    }
    
    //belongs to many IF we have category_post table

    // public function posts():BelongsToMany
    // {
    //     return $this->belongsToMany(Post::class);
    // }
}
