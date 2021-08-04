<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartsOfSpeech extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'acronym'];

    public function word()
    {
        return $this->belongsToMany(Word::class, 'word_parts_of_speeches',
            'parts_of_speeches_id', 'word_id');
    }
}
