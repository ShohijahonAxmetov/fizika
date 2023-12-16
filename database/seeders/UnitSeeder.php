<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        	[
        		'id' => 1,
        		'name' => 'метр',
        		'designation' => 'м',
        		'description' => 'Единица имерения длины',
        	],
        	[
        		'id' => 2,
        		'name' => 'килограмм',
        		'designation' => 'kg',
        		'description' => 'Единица имерения массы',
        	],
        	[
        		'id' => 3,
        		'name' => 'секунд',
        		'designation' => 'с',
        		'description' => 'Единица имерения времени',
        	],
        	[
        		'id' => 4,
        		'name' => 'моль',
        		'designation' => 'моль',
        		'description' => 'Единица имерения количества вещества',
        	],
        	[
        		'id' => 5,
        		'name' => 'кельвин',
        		'designation' => 'К',
        		'description' => 'Единица имерения абсолютной температуры',
        	],
        	[
        		'id' => 6,
        		'name' => 'ампер',
        		'designation' => 'ампер',
        		'description' => 'Единица имерения силы тока',
        	],
        	[
        		'id' => 7,
        		'name' => 'кандела',
        		'designation' => 'кд',
        		'description' => 'Единица имерения силы света',
        	]
        ];

        foreach ($data as $item) {
        	if (!Unit::find($item['id'])) Unit::create($item);
        }
    }
}
