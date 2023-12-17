<?php

namespace App\Models;

use App\Models\PhysicalMagnitude;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
    	'name',
    	'designation',
    	'description',
    ];

    public function physicalMagnitude()
    {
    	return $this->hasOne(PhysicalMagnitude::class);
    }
}
