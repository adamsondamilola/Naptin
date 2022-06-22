<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdmissionLetter
 *
 * @property int $id
 * @property int $course_id
 * @property int $application_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionLetter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionLetter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionLetter query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionLetter whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionLetter whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionLetter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionLetter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdmissionLetter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdmissionLetter extends Model
{
    use HasFactory;

    protected $guarded = [];
}
