<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\MediaItems
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $media
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems query()
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems whereMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MediaItems whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class MediaItems extends Model
{
    public $fillable = ['title', 'description', 'media'];
//    use HasFactory;
}
