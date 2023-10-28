<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';

    protected $guarded = ['id'];


    public function cat(){

        return $this->belongsTo(Cat::class);
         // Corses belongsTo  category  belongsTo-> ينتمي الي

    }

        public function trainer(){

            return $this->belongsTo(Trainer::class);
             //  trainer belongsTo Corses كل كورس ينتمي إلى مدرب واحد

        }

        public function student(){

            return $this->belongsToMany(Student::class);
             //Courses  hasMany student كل 'كورس' يمكن أن يكون له العديد من الطلاب.
        }

//         public function students()
// {
//     return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id')
//         ->withPivot('status'); // If you want to access the 'status' column in the pivot table.
// }

}
