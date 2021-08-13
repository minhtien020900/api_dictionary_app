<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'email'=>$this->email,
            'created_at' => (string)$this->created_at->format('d-m-Y'),
            'updated_at' => (string)$this->updated_at->format('d-m-Y'),
        ];
    }
}
