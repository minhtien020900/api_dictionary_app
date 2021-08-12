<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\v1\WordResource;
use App\Models\Models\Word;

class WordController extends ApiController
{
    //
    public function getAllWord()
    {
        $data = WordResource::collection(Word::all());

//        return new WordResource($data->find(89));
//        return WordResource::collection($data);
        return $this->sendResponse(config('api_custom.no_have_error'), config('api_custom.no_have_error'), $data, config('api_custom.status_code.200'));

    }
}
