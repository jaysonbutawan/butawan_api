<?php

namespace Database\Seeders;

use App\Models\TechStack;
use Illuminate\Database\Seeder;

class TechStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stacks = [
            'Laravel',
            'Angular',
            'Tailwind',
            'NodeJS',
            'MySQL',
            'PostgreSQL',
            'Kotlin',
            'Flutter',
            'TypeScript',
            'JavaScript',
            'Docker',
            'VSCode',
        ];

        foreach ($stacks as $index => $name) {
            TechStack::updateOrCreate(
                ['name' => $name], // Check if it exists by name
                [
                    'is_active' => true,
                    'sort_order' => $index // This maintains your order in the grid
                ]
            );
        }
    }
}
