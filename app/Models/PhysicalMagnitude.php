<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalMagnitude extends Model
{
    use HasFactory;

    protected $casts = [
    	'designation' => 'array'
    ];

    // protected $appends = [
    // 	'length'
    // ];

    // public function length($type)
    // {
    // 	return 
    // }
}
