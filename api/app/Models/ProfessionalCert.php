<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProfessionalCert
 *
 * @property int $id
 * @property int $user_id
 * @property string $certification_name
 * @property string $awarding_body
 * @property string $type
 * @property string $award_date
 * @property string $document
 * @property string $expiry_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereAwardDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereAwardingBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereCertificationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereExpiryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProfessionalCert whereUserId($value)
 * @mixin \Eloquent
 */
class ProfessionalCert extends Model
{
    use HasFactory;

    protected $guarded = [];
}
