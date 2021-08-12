<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Models\PartOfSpeech;
use App\Models\Models\PersonalVocabulary;
use Illuminate\Http\Request;

class PersonalVocabularyController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'topic_id' => [
                'bail', 'required'
            ],
            'word' => 'bail|required|string',
            'mean' => 'bail|required|string',
            'example_description' => 'bail|required|string',
            'pronounce' => 'bail|required',
            'part_of_speech_id' => 'bail|nullable'
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
        }
        $part_of_speech = PartOfSpeech::find($request->part_of_speech_id);

        $personal_word = PersonalVocabulary::create([
            'topic_id'=>$request->topic_id,
            'word'=>$request->word,
            'mean'=>$request->mean,
            'pronounce'=>$request->pronounce,
        ]);
        $personal_word->part_of_speechs()->save($part_of_speech);
        dd(1);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
