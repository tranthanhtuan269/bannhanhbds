<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapters';

    public function story()
    {
        return $this->belongsTo(ListTruyenfull::class);
    }
}
