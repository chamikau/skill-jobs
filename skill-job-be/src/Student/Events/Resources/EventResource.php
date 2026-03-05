<?php


namespace Student\Events\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class EventResource extends JsonResource
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
            'event' => $this->resource,
            'user_id_and_applicant_list_match' => $this->userId,
        ];
    }
}
