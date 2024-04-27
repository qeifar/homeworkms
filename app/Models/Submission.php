<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'assignment_id', 'student_id'];

    // Define any relationships here
    // Example:
    // public function assignment()
    // {
    //     return $this->belongsTo(Assignment::class);
    // }
}
