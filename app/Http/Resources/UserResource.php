<?php

namespace App\Http\Resources;

use App\Traits\HasTimestamps;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
                'name' => $this->name,
                'email' => $this->email,
                'api_token' => $this->when($this->api_token, $this->api_token, null),
            ],
            $this->getTimestamp()
        );
    }
}
