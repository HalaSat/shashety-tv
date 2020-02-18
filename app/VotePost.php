<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VotePost extends Model
{
    public function votes() {
      return $this->hasMany(Vote::class, 'vote_post_id');
    }
}
