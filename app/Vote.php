<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  public function post()
  {
    return $this->belongsTo(VotePost::class, 'vote_post_id');
  }
}
