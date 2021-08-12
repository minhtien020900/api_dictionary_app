<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'word' => $this->word,
            'pronounce' => $this->pronounce,
            'mean' => $this->means,
            'part_of_speech'=>PartOfSpeechResource::collection($this->part_of_speech),
        ];
    }
}
