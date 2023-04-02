<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'StudentID',
        'classcode',
        'classname',
        'units',
        'time',
        'day',
        'updated_at'
    ];



}
