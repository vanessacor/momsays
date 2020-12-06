<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'what',
        'how',
        'deadline',
        'isCompleted',
        'isArchived'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
