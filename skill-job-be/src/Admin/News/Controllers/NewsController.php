<?php

namespace Admin\News\Controllers;

use Admin\News\Requests\NewsDescriptionRequest;
use Admin\News\Requests\NewsRequest;
use Admin\News\Resources\NewsResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategoryType;
use Auth;
use DB;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class NewsController extends Controller
{

    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(News::with('newsCategoryType'))
            ->allowedFilters(['category_id' , 'headline' , 'content' , 'image',
                AllowedFilter::custom(
                    'search',
                    new FuzzyFilter(
                        'headline',
                    ))])
            ->allowedSorts('category_id' , 'headline' , 'content' , 'image')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }


    /**
     * @param NewsRequest $request
     * @return mixed
     * @throws \Throwable
     */
    public function store(NewsRequest $request): mixed
    {

        return DB::transaction(function () use ($request) {

            $news = News::create(collect($request->validated())->put('created_by', Auth::id())->toArray());

            if ($news) {
//      multiple images
                foreach ($request->validated()['image'] as $image) {
                    try {
                        $news->addMediaFromDisk($image)->toMediaCollection('image_documents');
                    } catch (FileDoesNotExist|FileIsTooBig $e) {
                    }
                }
            }

            return new NewsResource($news);
        });
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return NewsResource
     */
    public function show(int $id): NewsResource
    {
        $course = News::with('newsCategoryType')
            ->findOrFail($id)
        ->append('document_images');
        return new NewsResource($course);
    }

    /**
     * @param $id
     * @return LengthAwarePaginator
     */
    public function getFiles($id): LengthAwarePaginator
    {
        $media = QueryBuilder::for(News::findOrFail($id)
            ->media()->where('collection_name', 'image_documents')
        )
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);

        $media->getCollection()->transform(function ($media_object) {
            $media_object['tempUrl'] = $media_object->getTemporaryUrl(now()->addMinutes(10));
            return $media_object;
        });
        return $media;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NewsRequest $request
     * @param int $id
     * @return NewsResource
     */
    public function update(NewsRequest $request, int $id): NewsResource
    {
        return DB::transaction(function () use ($id, $request) {

        $course = News::findOrFail($id);
        $course->update($request->validated());

            if ($course) {
                foreach ($request->validated()['image'] as $image) {
                    try {
                        $course->addMediaFromDisk($image)->toMediaCollection('image_documents');
                    } catch (FileDoesNotExist|FileIsTooBig $e) {
                  }
                }
            }
            return new NewsResource($course);
        });


    }
}
