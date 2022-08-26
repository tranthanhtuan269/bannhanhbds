<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class ListTruyenfull extends Model
{
    protected $table = 'list_truyenfull';

    public $timestamps = false;
    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'story_id');
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
