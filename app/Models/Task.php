<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'what',
        'deadline',
        'points',
        'isCompleted',
        'isreviewed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function markAsDone()
    {
        $this->isCompleted = true;
                
    }

    
}
