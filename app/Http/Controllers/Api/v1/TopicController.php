<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\ApiController;
use App\Http\Resources\v1\TopicResource;
use App\Models\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class TopicController extends ApiController
{
    //
    public function getUserTopic($user_id)
    {
        $topics = Topic::where('user_id', $user_id)->get();

        return TopicResource::collection($topics);

    }

    public function addTopic(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('topics', 'name')->
                where(function ($query) {
                    return $query->where('user_id', \auth()->user()->id);
                }),
            ]
            ,
            'markup_default' => 'bail|required|boolean',
        ]);
        if ($validator->fails()) {
            return $this->sendResponse(config('api_custom.have_error'),
                $validator->errors(), null, config('api_custom.status_code.422'));
        }
        if (Auth::check()) {
            $topic = Topic::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'markup_default' => $request->markup_default,
            ]);
            return $this->sendResponse(config('api_custom.no_have_error'), null, $topic, config('api_custom.status_code.200'));
        }
    }

    public function editTopic(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'id' => 'bail|required',
            'name' => [
//                'required',
                Rule::unique('topics')->ignore($request->id, 'id')->
                where(function ($query) {
                    return $query->where('user_id', \auth()->user()->id);
                }),

            ],
//            'markup_default' => 'bail|required|boolean',
        ]);
        if ($validator->fails()) {
            return $this->sendResponse(config('api_custom.have_error'),
                $validator->errors(), null, config('api_custom.status_code.422'));
        }
        $topic = Topic::find($request->id);
        $topic->name = $request->name;
        $topic->save();

        return $this->sendResponse(config('api_custom.no_have_error'),
            null, $topic, config('api_custom.status_code.200'));

    }

    public function deleteTopic(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'bail|required',
        ]);
        if ($validator->fails()) {
            return $this->sendResponse(config('api_custom.have_error'),
                $validator->errors(), null, config('api_custom.status_code.422'));
        }
        $topicId = $request->id;
        $topic = Topic::find($topicId);

        if ($topic->delete()) {
            return $this->sendResponse(config('api_custom.no_have_error'),
                null, $topic, config('api_custom.status_code.200'));
        }
    }
}
