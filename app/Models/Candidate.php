<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{

    public $table = "candidates";
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'age', 'role'
    ];
}


