<?php

namespace Database\Seeders;

use App\Models\PhysicalMagnitude;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhysicalMagnitudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        	[
        		'id' => 1,
        		'unit_id' => 1,
        		'name' => 'Длина',
        		'designation' => ['l', 's'],
        		'uniqueDesignation' => 'Length',
        	],
        	[
        		'id' => 2,
        		'unit_id' => 2,
        		'name' => 'Масса',
        		'designation' => ['m'],
        		'uniqueDesignation' => 'Weight',
        	],
        	[
        		'id' => 3,
        		'unit_id' => 3,
        		'name' => 'Время',
        		'designation' => ['t'],
        		'uniqueDesignation' => 'Time',
        	],
        	[
        		'id' => 4,
        		'unit_id' => 4,
        		'name' => 'Количество вещества',
        		'designation' => ['v'],
        		'uniqueDesignation' => 'AmountOfSubstance',
        	],
        	[
        		'id' => 5,
        		'unit_id' => 5,
        		'name' => 'Температура',
        		'designation' => ['T'],
        		'uniqueDesignation' => 'Temperature',
        	],
        	[
        		'id' => 6,
        		'unit_id' => 6,
        		'name' => 'Сила тока',
        		'designation' => ['I'],
        		'uniqueDesignation' => 'Amperage',
        	],
        	[
        		'id' => 7,
        		'unit_id' => 7,
        		'name' => 'Сила света',
        		'designation' => ['I'],
        		'uniqueDesignation' => 'LuminousIntensity',
        	]
        ];

        foreach ($data as $item) {
        	if (!PhysicalMagnitude::find($item['id'])) PhysicalMagnitude::create($item);
        }
    }
}
