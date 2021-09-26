<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;

    public function get_word()
    {
        return Word::where('status',0);
    }

    public function search($title,$person)
    {
        if(!empty($title) && empty($person)){   
            return $this->get_word()->where('title',$title);
        }elseif(empty($title) && !empty($person)){
            return $this->get_word()->where('person',$person);
        }else{
            return $this->get_word()->where('person',$person)->where('title',$title);
        }
    }
}
