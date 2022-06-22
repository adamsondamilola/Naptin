<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Kit
 *
 * @property int $id
 * @property string $shoe_size
 * @property string $overall_size
 * @property string $t_shirt_size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Kit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Kit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Kit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kit whereOverallSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kit whereShoeSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kit whereTShirtSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Kit whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Kit whereUserId($value)
 */
class Kit extends Model
{
    use HasFactory;

    protected $guarded = [];
}
