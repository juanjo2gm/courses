<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'title',
        'description',
        'user_id', 
        'creation_date',
        'student_count',
    ];

    // Relación 1 a Muchos 
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación 1 a muchos 
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }
}
