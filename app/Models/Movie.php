<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $primaryKey = 'idMovie';
    public $incrementing = false;

    protected $fillable = [
        'idMovie',
        'Director_idDirector',
        'Studio_idStudio',
        'name_movie',
        'country_of_release',
        'year_of_release',
        'language',
        'filming_location',
        'category'
    ];
}