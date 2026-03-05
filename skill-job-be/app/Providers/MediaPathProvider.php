<?php


namespace App\Providers;

use App\Models\MediaArchive;
use Modules\Core\Entities\EdContent;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;

class MediaPathProvider extends DefaultPathGenerator
{
    /*
     * Get a unique base path for the given media.
     */
    protected function getBasePath(Media $media): string
    {
        return config('app.env') . '/' . $media->getKey();
    }
}
