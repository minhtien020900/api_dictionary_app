<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartOfSpeech extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'acronym'];

    public $table = 'parts_of_speeches';

    public function word()
    {
        return $this->belongsToMany(Word::class, 'word_parts_of_speeches',
            'parts_of_speeches_id', 'word_id');
    }
    public function words(){
        return $this->morphedByMany(Word::class,'part_of_speech_able','part_of_speechtables','part_of_speech_able');
    }
    public function personal_vocabularies(){
        return $this->morphedByMany(PersonalVocabulary::class,
            'part_of_speech_able',
            'part_of_speechables','part_of_speech_able');
    }
}
