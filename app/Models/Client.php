<?php

namespace App\Models;
/**
 * @property int $id
 * @property string $name
 * @property string $lastname
 * @property string $meil
 * @property string $pass
 * @property bool $published
 * @property  string $created_at
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
class Client extends Model
{
    use SoftDeletes;
    public function images(): HasMany
    {
        return $this ->hasMany(UserImage::class);
    }
    public function image(): HasOne
    {
        return $this->hasOne(UserImage::class)->ofMany('sort', 'MIN');
    }
}

