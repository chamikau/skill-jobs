<?php

namespace App\Models;

use Eloquent;
use hollodotme\FastCGI\RequestContents\JsonData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Certification
 * @property int $id
 * @property int $education_id
 * @property int $student_id
 * @property string $title
 * @property string $start_date
 * @property string $end_date
 * @property string $links
 * @mixin Eloquent
 */
class Certification extends Model
{
    use HasFactory;

    protected $fillable = ['education_id', 'student_id','title','start_date','end_date','links'];

    /**
     * @return BelongsTo
     */
    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class, 'education_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }
}
