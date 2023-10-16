<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function Courses(){
        return $this->hasMany(Courses::class);
         // Corses hasMany trainer كل مدرب يمكن أن يكون له العديد من الكورسات.
    }
}

