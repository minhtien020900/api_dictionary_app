<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Models\Example;
use App\Models\Models\PartOfSpeech;
use App\Models\Models\PersonalVocabulary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PersonalVocabularyController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            $data = \App\Http\Resources\v1\PersonalVocabulary::collection(auth()->user()->personal_words);
            return $this->sendResponse(config('api_custom.no_have_error'), null, $data, config('api_custom.status_code.200'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'topic_id' => [
                'bail', 'required'
            ],
            'word' => [
                'bail',
                'required',
                Rule::unique('personal_vocabularies', 'word')
                    ->where(function ($query) {
                        return $query->where('topic_id', \request()->topic_id);
                    }),
            ],
            'mean' => 'bail|required|string',
            'example_description' => 'bail|required|array',
            'pronounce' => 'bail|required',
            'part_of_speech_id' => 'bail'
        ]);

        //Check validator error
        if ($validator->fails()) {
            return $this->sendResponse(config('api_custom.have_error'), $validator->errors(), null, config('api_custom.status_code.422'));

        } else {

            // Create new personal word
            $personal_word = PersonalVocabulary::create([
                'topic_id' => $request->topic_id,
                'word' => $request->word,
                'mean' => $request->mean,
                'pronounce' => $request->pronounce,
            ]);

            // Find type part of speech and save to table part_of_speech_able
            $arr_part_of_speech = [];
            foreach ($request->part_of_speech_id as $value) {
                $arr[] = PartOfSpeech::find($value);
            }
            $personal_word->part_of_speechs()->saveMany($arr_part_of_speech);

            // Save data in table examples
            foreach ($request->example_description as $desc) {
                $personal_word->examples()->save(
                    new Example([
                            'description' => $desc,
                            'personal_vocabulary_id' => $personal_word->id,
                        ]
                    )
                );
            }

            // Send response
            return $this->sendResponse(config('api_custom.no_have_error'), null, true, config('api_custom.status_code.200'));

        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'topic_id' => [
                'bail', 'required'
            ],
            'word' => [
                'required',
                Rule::unique('personal_vocabularies', 'word')->ignore($request->id, 'id')
                    ->where(function ($query) {
                        return $query->where('topic_id', \request()->topic_id);
                    }),
            ],
            'mean' => 'bail|required|string',
            'example_description' => 'bail|required|array',
            'pronounce' => 'bail|required',
            'part_of_speech_id' => 'bail'
        ]);
        if ($validator->fails()) {
            return $this->sendResponse(config('api_custom.have_error'), $validator->errors(), null, config('api_custom.status_code.422'));
        }

        $personal_word = PersonalVocabulary::find($request->id);
        foreach ($request->except(['example_description']) as $attr => $value) {
            $personal_word->$attr = $value;
        };
        foreach ($request->example_description as $value){

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
