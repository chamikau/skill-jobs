<?php


namespace Student\Jobs\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class JobResource extends JsonResource
{
    protected $userId;
    public function __construct($resource, $userId)
    {
        parent::__construct($resource);
        $this->userId = $userId;
    }

    public function toArray($request)
    {
        return [
            'job' => $this->resource,
            'user_id_is_match' => $this->userId,
        ];
    }
}
