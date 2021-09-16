<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function store($user_id,$word_id)
    {
        $this->user_id = $user_id;
        $this->word_id = $word_id;
        $this->save();
    }
}
