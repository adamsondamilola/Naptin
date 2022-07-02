<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = [
//        'id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Application::class, 'trainee_id', 'id');
    }
}
