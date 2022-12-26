<?php

namespace App\Http\Resources;

use App\Traits\HasTimestamps;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    use HasTimestamps;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge(
            [
                'id' => $this->id,
                'title' => $this->title,
                'body' => $this->body,
            ],
            $this->getTimestamp()
        );
    }
}
