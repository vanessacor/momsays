<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'instructions',
        'deadline',
        'points',
        'isCompleted',
        'isreviewed'
    ];

    protected $dates = [
        'deadline',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toggleCompletion()
    {
        $this->isCompleted =  !$this->isCompleted;
        $this->save();
    }

    // public function setDateAttribute($value)
    // {
    //     $this->attributes['date'] = (new Carbon($value))->format('d/m/y');
    // }


}
