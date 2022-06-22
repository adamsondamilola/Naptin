<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EducationalLevel
 *
 * @property int $id
 * @property int $user_id
 * @property string $level
 * @property string $start_date
 * @property string $end_date
 * @property string $institution_name
 * @property string $qualification_obtained
 * @property string|null $document
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereInstitutionName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereQualificationObtained($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalLevel whereUserId($value)
 * @mixin \Eloquent
 */
class EducationalLevel extends Model
{
    use HasFactory;

    protected $guarded = [];
}
