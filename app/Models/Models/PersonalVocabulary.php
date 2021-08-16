<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalVocabulary extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'user_id', 'topic_id',
        'word', 'mean', 'part_of_speech_id', 'example_id','pronounce',];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function examples()
    {
        return $this->hasMany(Example::class, 'personal_vocabulary_id', 'id');
    }

    public function part_of_speechs()
    {

        return $this->morphToMany(PartOfSpeech::class, 'part_of_speech_able',
            'part_of_speechtables',
            'part_of_speech_able');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'personal_vocabulary_id', 'id');
    }
}
