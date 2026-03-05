<?php

namespace App\Models;

use Company\Jobs\States\Job\JobState;
use Admin\Organizations\States\Organization\OrganizationState;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use phpDocumentor\Reflection\Types\Static_;
use PhpParser\Builder;
use Spatie\ModelStates\HasStates;

/**
 * App\Models\Job
 * @property int $id
 * @property int $created_by
 * @property int $organization_id
 * @property int $city_id
 * @property string $title
 * @property string $location_type
 * @property int $number_of_openings
 * @property int $probation_duration
 * @property int $work_hours
 * @property int $work_hour_rate
 * @property string $application
 * @property string $description
 * @property string $state
 * @method static Builder|Job whereState($value)
 * @method static Builder|Job organizationFilter($organization_id)
 * @mixin Eloquent
 */
class Job extends Model
{
    use HasFactory,HasStates;

    protected $fillable = ['created_by','organization_id','city_id','title','location_type','number_of_openings','probation_duration','work_hours','work_hour_rate','application','description','state'];


    protected $casts = [
        'state' => JobState::class,
    ];
//    /**
//     * @var string[]
//     */
//    protected $casts = [
//        'data' => 'array'
//    ];

//    /**
//     * @return BelongsTo
//     */
//    public function admin(): BelongsTo
//    {
//        return $this->belongsTo(Admin::class, 'admin_id', 'id');
//    }

    /**
     * @return BelongsTo
     */
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class, 'organization_id', 'id');
    }

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
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class,'city_id','id');
    }

    /**
     * @param $query
     * @param $organization_id
     * @return mixed
     */
    public function scopeOrganizationFilter($query, $organization_id): mixed
    {
        return $query->where('organization_id', $organization_id);
    }

    /**
     * @return HasMany
     */
    public function jobTypes(): HasMany
    {
        return $this->hasMany(StudentJobType::class);
    }

    /**
     * @return belongsToMany
     */
    public function students(): belongsToMany
    {
        return $this->belongsToMany(Student::class,'student_job_applies');
    }

}
