<?php

namespace App\Models;

use App\Models\PhysicalMagnitude;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequiredPhysicalMagnitudesGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'physical_magnitude_id',
        'required_physical_magnitude_ids',
        'action',
    ];

    protected $casts = [
    	'required_physical_magnitude_ids' => 'array'
    ];

    public function physicalMagnitude()
    {
    	return $this->belongsTo(PhysicalMagnitude::class);
    }
}
