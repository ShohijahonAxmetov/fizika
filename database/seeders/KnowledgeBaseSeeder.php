<?php

namespace Database\Seeders;

use App\Models\KnowledgeBase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KnowledgeBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        	[
        		'id' => 1,
        		'name' => 'Скорость',
        		'designation' => 'V',
        		'uniqueDesignation' => 'Speed',
        		'action' => 'speed'
        	]
        ];

        foreach ($data as $item) {
        	if (!KnowledgeBase::find($item['id'])) KnowledgeBase::create($item);
        }
    }
}
