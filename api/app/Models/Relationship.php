<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Relationship
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship query()
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relationship whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Relationship extends Model
{
    use HasFactory;

    protected $guarded = [];
}
