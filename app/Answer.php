<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $timestamps = false;
    
    public function user() {
      return $this->belongsTo('User');
    }

    public function question(){
      return $this->belongsTo('Question');
    }
}
