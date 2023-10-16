<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    public function Courses(){
        return $this->belongsToMany(Courses::class);
         // student hasMany Courses كل 'طالب' يمكن أن يكون له العديد من الكورسات.
    }
}
