<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\IndustryTypeStudent
 * @property int $id
 * @property int $student_id
 * @property int $industry_type_id
 * @mixin Eloquent
 */
class IndustryTypeStudent extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'industry_type_id'];


    /**
     * @return belongsTo
     */
    public function student(): belongsTo
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }

    /**
     * @return belongsTo
     */
    public function industryType(): belongsTo
    {
        return $this->belongsTo(IndustryType::class,'industry_type_id','id');
    }

    /**
     * @return hasMany
     */
    public function industryJobTitle(): hasMany
    {
        return $this->hasMany(IndustryJobTitle::class);
    }

}
