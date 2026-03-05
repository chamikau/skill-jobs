<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Session
 * @property int $created_by
 * @property int $session_type_id
 * @property int $mentor_id
 * @property int $fees
 * @property string $available_time
 * @property string $description
 * @mixin Eloquent
 */
class Session extends Model
{
    use HasFactory;

    protected $fillable = ['created_by' , 'session_type_id' , 'mentor_id' , 'fees' , 'available_time' , 'description'];

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class,'created_by','id');
    }


    /**
     * @return BelongsTo
     */
    public function mentors(): BelongsTo
    {
        return $this->belongsTo(Mentor::class,'mentor_id','id');
    }

    /**
     * @return BelongsTo
     */
    public function sessionTypes(): BelongsTo
    {
        return $this->belongsTo(SessionType::class,'session_type_id','id');
    }

}
