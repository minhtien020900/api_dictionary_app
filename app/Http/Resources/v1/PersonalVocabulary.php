<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonalVocabulary extends JsonResource
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
            'word' => $this->word,
            'mean' => $this->mean,
            'topic'=>new TopicResource($this->topic),
            'pronounce' => $this->pronounce,
            'part_of_speech' => PartOfSpeechResource::collection($this->part_of_speechs),
            'example' => ExampleResource::collection($this->examples),
            'image' => ImageResource::collection($this->images),
            'created_at' => (string)$this->created_at->format('d-m-Y'),
            'updated_at' => (string)$this->updated_at->format('d-m-Y'),
        ];
    }
}
