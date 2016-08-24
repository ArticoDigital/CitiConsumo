<?php

namespace City\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['score', 'text', 'buy_id'];
}
