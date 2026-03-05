<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use PhpParser\Builder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Student
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone_number_1
 * @property string | null $phone_number_2
 * @property string $email
 * @property string $linkedin_link
 * @property string $facebook_link
 * @property string $instagram_link
 * @property string $github_link
 * @method static Builder|Job organizationFilter($organization_id)
 * @mixin Eloquent
 */
class Student extends Authenticatable implements HasMedia
{
    use HasFactory,InteractsWithMedia, Notifiable;

    protected $fillable = ['first_name', 'last_name', 'phone_number_1', 'phone_number_2', 'email', 'password' ,'linkedin_link' ,'facebook_link' ,'instagram_link' ,'github_link'];

    protected $hidden = [
        'media'
    ];

    /**
     * @return mixed
     */
    public function getProfileImageAttribute()
    {
        return $this->getMedia('profile_image')[0]->getTemporaryUrl(Carbon::now()->addMinutes(5));
    }

    /**
     * @return MorphOne
     */
    public function profileImage(): MorphOne
    {
        return $this->morphOne(Media::class, 'model');
    }
    /**
     * @return MorphMany
     */
    public function documents(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * @return HasMany
     */
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    /**
     * @return HasMany
     */
    public function certifications(): HasMany
    {
        return $this->hasMany(Certification::class);
    }

    /**
     * @return HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * @return HasMany
     */
    public function acvities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }


    /**
     * @return belongsToMany
     */
    public function skills(): belongsToMany
    {
        return $this->belongsToMany(Skill::class,'student_skills');
    }

    /**
     * @return belongsToMany
     */
    public function industryTypeStudents(): belongsToMany
    {
        return $this->belongsToMany(IndustryType::class,'industry_type_students');
    }

    /**
     * @return belongsToMany
     */
    public function hobbies(): belongsToMany
    {
        return $this->belongsToMany(Hobby::class,'student_hobbies');
    }

    /**
     * @return belongsToMany
     */
    public function jobTypes(): belongsToMany
    {
        return $this->belongsToMany(JobType::class,'student_job_types');
    }

    /**
     * @return HasMany
     */
    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    /**
     * @return HasMany
     */
    public function workExperience(): HasMany
    {
        return $this->hasMany(WorkExperience::class);
    }

    /**
     * @return belongsToMany
     */
    public function jobs(): belongsToMany
    {
        return $this->belongsToMany(Job::class,'student_job_applies');
    }

    /**
     * @return HasMany
     */
    public function studentGoals(): HasMany
    {
        return $this->hasMany(StudentGoal::class);
    }

    /**
     * @return belongsToMany
     */
    public function courses(): belongsToMany
    {
        return $this->belongsToMany(Course::class,'student_course_applies')
            ->withPivot('state');
    }

    /**
     * @return belongsToMany
     */
    public function events(): belongsToMany
    {
        return $this->belongsToMany(Event::class,'student_event_applies');
    }
}
