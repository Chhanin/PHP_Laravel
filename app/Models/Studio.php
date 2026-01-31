<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $table = 'studios';
    protected $primaryKey = 'idStudio';
    public $incrementing = false;

    protected $fillable = [
        'idStudio',
        'company_name',
        'city',
        'founded',
        'company_type'
    ];
}