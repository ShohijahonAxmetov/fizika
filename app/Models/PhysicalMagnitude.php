<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalMagnitude extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'name',
        'designation',
        'uniqueDesignation',
    ];

    protected $casts = [
    	'designation' => 'array'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function requiredPhysicalMagnitudesGroup()
    {
        return $this->hasMany(RequiredPhysicalMagnitudesGroup::class);
    }
}
