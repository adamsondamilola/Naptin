<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProgramType
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $banner
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProgramType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProgramType extends Model
{
    use HasFactory;
}
