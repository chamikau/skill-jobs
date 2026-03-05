<?php
namespace Student\Profile\Controllers;

use App\Models\Student;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Student\Profile\Requests\ProfileRequest;
use Student\Profile\Resources\ProfileResource;
use App\Http\Controllers\Controller;
use Hash;
use Auth;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProfileResource
     */
    public function index()
    {
        $user = Auth::user();
        return new ProfileResource($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProfileRequest $request
     * @return ProfileResource
     */
    public function update(ProfileRequest $request): ProfileResource
    {
        $user = Auth::user();
        $user->update($request->validated());
        if ($user) {
//      multiple images
            foreach ($request->validated()['profile_image'] as $image) {
                try {
                    $user->addMediaFromDisk($image)->toMediaCollection('profile_image')->where('model_id',Auth::id());
                } catch (FileDoesNotExist|FileIsTooBig $e) {
                }
            }
        }
        return new ProfileResource($user->refresh());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return ProfileResource
     */
    public function show(int $id):ProfileResource
    {
        $user = Student::with('documents')
        ->findOrFail($id);
        // Attach temporary URLs to media documents
        $user->documents->transform(function ($document) {
            $document->tempUrl = $document->getTemporaryUrl(now()->addMinutes(10)); // Temporary URL for 10 minutes
            return $document;
        });
        return new ProfileResource($user);
    }

//    /**
//     * @param $user
//     * @return LengthAwarePaginator
//     */
//    public function getFiles($user): LengthAwarePaginator
//    {
//        $media = $user
//            ->profileImage()->where('collection_name', 'profile_image');
//
////        $media->getCollection()->transform(function ($media_object) {
////            $media_object['tempUrl'] = $media_object->getTemporaryUrl(now()->addMinutes(10));
////            return $media_object;
////        });
//        return $media[0]->getTemporaryUrl(Carbon::now()->addMinutes(5));
//    }


}
