<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Course
 *
 * @property int $id
 * @property string $uuid
 * @property string $course_code
 * @property int $trainer_id
 * @property int $course_type_id
 * @property int $program_type_id
 * @property string $course_title
 * @property string $description
 * @property string $course_image
 * @property string $program_category
 * @property string|null $advert_code
 * @property string $start_date
 * @property string $duration
 * @property int $cost
 * @property int $no_of_installments
 * @property int $min_deposit
 * @property string $pub_status
 * @property string $pub_date
 * @property string $ad_close_date
 * @property string $pay_close_date
 * @property string $projected_start_date
 * @property string $actual_start_date
 * @property string $projected_end_date
 * @property string $actual_end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereActualEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereActualStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereAdCloseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereAdvertCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCourseTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereMinDeposit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereNoOfInstallments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePayCloseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereProgramCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereProgramTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereProjectedEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereProjectedStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePubDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course wherePubStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereTrainerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereUuid($value)
 * @mixin \Eloquent
 */
class Course extends Model
{
    use HasFactory;

    protected $guarded = [];
}
