<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //*Module Seeding
        $names = [
            'directors',
            'principals',
            'teachers',
            'management',
            'accountant',
            'student',
            'parent'
        ];


        foreach ($names as $name) {
            Module::create([
                'name' => $name,
                'slug' => str()->slug($name),
            ]);
        }


        //*Module Seeding Ends


        //*Permission Section Starts 
        foreach ($names as $index => $name) {
            Section::create([
                'module_id' => ++$index,
                'name' => $name,
                'slug' => str()->slug($name),
            ]);
        }
        //*Permission Section Ends

    }
}
