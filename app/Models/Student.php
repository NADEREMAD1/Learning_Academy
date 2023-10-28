<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

        protected $table = 'students';

      protected $guarded = ['id'];

//     public function courses()
// {
//     return $this->hasMany(Courses::class);
//          // student hasMany Courses كل 'طالب' يمكن أن يكون له العديد من الكورسات.

// }
public function courses()
{
    return $this->belongsToMany(Courses::class);
}
}
