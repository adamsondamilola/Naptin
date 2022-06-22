<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserDetail
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $surname
 * @property string|null $birth_date
 * @property string|null $gender
 * @property string|null $phone_number
 * @property string|null $avatar
 * @property string|null $signature
 * @property string|null $residential_address
 * @property int|null $state_of_residence
 * @property int|null $state_of_origin
 * @property int|null $lga_of_origin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereLgaOfOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereResidentialAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereStateOfOrigin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereStateOfResidence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|UserDetail whereUserId($value)
 */
class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [];
}
