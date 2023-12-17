<?php

namespace Database\Seeders;

use App\Models\RequiredPhysicalMagnitudesGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequiredPhysicalMagnitudeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        	[
        		'id' => 1,
        		'physical_magnitude_id' => 8,
        		'required_physical_magnitude_ids' => [1,3],
        		'action' => 'Length/Time'
        	]
        ];

        foreach ($data as $item) {
        	if (!RequiredPhysicalMagnitudesGroup::find($item['id'])) RequiredPhysicalMagnitudesGroup::create($item);
        }
    }
}
