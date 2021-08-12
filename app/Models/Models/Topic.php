<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    protected $fillable=['id','user_id','name','markup_default'];

    public function personal_vocabularies(){
        return $this->hasMany(PersonalVocabulary::class,'topic_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
