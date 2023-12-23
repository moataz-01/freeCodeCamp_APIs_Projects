<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'duration',
        'date'
    ];


    public function users() {
        return $this->belongsToMany(User::class);
    }

}
