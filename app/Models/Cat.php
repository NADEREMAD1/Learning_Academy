<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Courses(){

        return $this->hasMany(Courses::class);  // category hasMany Corses hasMany-> لدية الكثير

    }


}
