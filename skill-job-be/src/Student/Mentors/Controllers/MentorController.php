<?php

namespace Student\Mentors\Controllers;

use Student\Mentors\Resources\MentorResource;
use App\Filters\FuzzyFilter;
use App\Http\Controllers\Controller;
use App\Models\Mentor;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class MentorController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('organization-permission-checker:list-Mentor')->only('index');
//        $this->middleware('organization-permission-checker:create-Mentor')->only('store');
//        $this->middleware('organization-permission-checker:show-Mentor')->only('show');
//        $this->middleware('organization-permission-checker:update-Mentor')->only('update');
//        $this->middleware('organization-permission-checker:state-update-Mentor')->only('active,inactive');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return QueryBuilder::for(Mentor::with('session', 'mentorSkill', 'mentorEducation', 'mentorWorkExperience'))->allowedFilters(['name', 'position', 'phone_number_1', 'about_mentor', AllowedFilter::custom('search', new FuzzyFilter('name'))])->allowedSorts('name', 'position', 'phone_number_1', 'about _mentor')->orderByDesc('id')->paginate(request('per_page') <= 200 ? request('per_page') : 15);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return MentorResource
     */
    public function show(int $id): MentorResource
    {
        $mentor = Mentor::with('session', 'mentorSkill', 'mentorEducation', 'mentorWorkExperience')->findOrFail($id);
        return new MentorResource($mentor);
    }

}
