<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory;

    protected $table = 'movies';
    protected $primaryKey = 'idMovie';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Director_idDirector',
        'Studio_idStudio',
        'name_movie',
        'country_of_release',
        'year_of_release',
        'language',
        'filming_location',
        'category'
    ];

    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class, 'Director_idDirector', 'idDirector');
    }

    public function studio(): BelongsTo
    {
        return $this->belongsTo(Studio::class, 'Studio_idStudio', 'idStudio');
    }
}