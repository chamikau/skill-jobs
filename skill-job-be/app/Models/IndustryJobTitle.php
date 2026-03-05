<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\IndustryJobTitle
 * @property int $id
 * @property int $industry_type_id
 * @property string $industry_job_title
 * @mixin Eloquent
 */
class IndustryJobTitle extends Model
{
    use HasFactory;

    protected $fillable = ['industry_type_id', 'industry_job_title'];


    /**
     * @return belongsTo
     */
    public function industryTypeStudent(): belongsTo
    {
        return $this->belongsTo(IndustryTypeStudent::class,'industry_type_id','id');
    }

}
