<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;

use App\Http\Resources\v1\PartOfSpeechResource;
use App\Models\Models\PartOfSpeech;
use Illuminate\Http\Request;

class PartOfSpeechController extends ApiController
{
    //
    public function get(){
        $data =  PartOfSpeechResource::collection(PartOfSpeech::all());
        return $this->sendResponse(config('api_custom.no_have_error'), null, $data, config('api_custom.status_code.200'));

    }
}
