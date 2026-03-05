<?php

namespace App\Models;


use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


/**
 * App\Models\News
 * @property int $id
 * @property int $created_by
 * @property int $category_id
 * @property string $headline
 * @property string $content
 * @mixin Eloquent
 */
class News extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia ;

    protected $fillable = ['created_by' , 'category_id' , 'headline' , 'content' ];

    protected $hidden = [
        'media'
    ];

    /**
     * @return MorphMany
     */
    public function documents(): MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(SuperAdmin::class,'created_by','id');
    }

    /**
     * @return BelongsTo
     */
    public function newsCategoryType(): BelongsTo
    {
        return $this->belongsTo(NewsCategoryType::class,'category_id','id');
    }


    public function getDocumentImagesAttribute()
    {
        return $this->getMedia('image_documents')->map(function (Media $media){
            return [
                'documentUrl'=>$media->getTemporaryUrl(now()->addDay(1))
            ];
        });
    }
}
