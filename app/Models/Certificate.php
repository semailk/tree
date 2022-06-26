<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $user_id
 * @property string $plantation_year
 * @property string $code
 * @property integer $total_price
 * @property integer $number_of_trees
 * @property integer $name
 * @property integer $last_name
 * @property integer $email
 * @property integer $status
 *
 * Class Certificate
 * @package App\Models
 */
class Certificate extends Model
{
    use HasFactory;

    protected $softDelete = true;
    protected $fillable = [
        'user_id',
        'plantation_year',
        'number_of_trees',
        'total_price',
        'name',
        'last_name',
        'email',
        'code',
        'status'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->last_name . ' ' . $this->name;
    }
}
