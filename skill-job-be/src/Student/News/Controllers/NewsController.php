<?php

namespace Student\News\Controllers;

use App\Models\CourseType;
use App\Models\News;
use App\Models\NewsCategoryType;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Student\News\Requests\NewsRequest;
use Student\News\Resources\NewsResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Course;
use Auth;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class NewsController extends Controller
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        // Retrieve News with Filters, Sorting, and Pagination
        $news = QueryBuilder::for(News::with('documents', 'newsCategoryType'))
            ->allowedFilters([
                'category_id',
                'headline',
                'content',
                'image',
                AllowedFilter::custom('search', new FuzzyFilter('headline')),
            ])
            ->allowedSorts('category_id', 'headline', 'content', 'image')
            ->orderByDesc('id')
            ->paginate(request('per_page') <= 200 ? request('per_page') : 15);

        // Process each news item to include temporary URLs for media
        $news->getCollection()->transform(function ($item) {
            // Attach temporary URLs to media documents
            $item->documents->transform(function ($document) {
                $document->tempUrl = $document->getTemporaryUrl(now()->addMinutes(10)); // Temporary URL for 10 minutes
                return $document;
            });
            return $item;
        });

        // Combine News into a single response
        return response()->json([
            'news' => $news,
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return NewsResource
     */
    public function show(int $id): NewsResource
    {
        // Fetch the news item by ID, along with its related models
        $news = News::with('documents', 'admin', 'newsCategoryType')->findOrFail($id);

        // Attach temporary URLs to media documents
        $news->documents->transform(function ($document) {
            $document->tempUrl = $document->getTemporaryUrl(now()->addMinutes(10)); // Temporary URL for 10 minutes
            return $document;
        });

        // Return the news item as a NewsResource
        return new NewsResource($news);
    }


}
