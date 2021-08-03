<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseController;
use App\Models\Models\Word;

class WordController extends BaseController
{
    //
    public function getAllWord()
    {

        $data = Word::all();

        return $this->sendResponse(config('api_custom.no_have_error'),
            config('api_custom.no_have_error'), $data, config('api_custom.status_code.200'));

    }
}
