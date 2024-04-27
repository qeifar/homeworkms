<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'deadline'];

    // Define any relationships here
    // Example:
    // public function submissions()
    // {
    //     return $this->hasMany(Submission::class);
    // }
}
