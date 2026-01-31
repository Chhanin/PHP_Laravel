<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Director extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'directors';
    protected $primaryKey = 'idDirector';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name_director',
        'gender_director',
        'place_birth_director',
        'country_director',
        'year_birth_director'
    ];
}