<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'word', 'pronounce', 'mean'];

    public function part_of_speech()
    {
        return $this->belongsToMany(PartOfSpeech::class, 'word_parts_of_speeches'
            , 'word_id', 'parts_of_speeches_id');
    }
    public function part_of_speechs(){
        return $this->morphToMany(PartOfSpeech::class,'part_of_speech_able',
            'part_of_speechtables',
        'part_of_speech_able');
    }

}
