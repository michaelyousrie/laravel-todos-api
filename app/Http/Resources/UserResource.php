<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'api_token' => $this->when($this->api_token, $this->api_token, null),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'created_at_friendly' => $this->created_at->diffForHumans()
        ];
    }
}
