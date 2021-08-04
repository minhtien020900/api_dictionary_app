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
        return $this->belongsToMany(PartsOfSpeech::class, 'word_parts_of_speeches'
            , 'word_id', 'parts_of_speeches_id');
    }

}
