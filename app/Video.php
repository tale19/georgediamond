<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function show()
    {
        return $this->belongsTo(Show::class);
    }
}
