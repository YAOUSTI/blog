<?php

use Faker\Provider\cs_CZ\Internet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Buisiness & Management',
                'slug' => 'B & M'
            ],
            [
                'name' => 'Creative Arts & Media',
                'slug' => 'CA & M'
            ],
            [
                'name' => 'Health & Psychology',
                'slug' => 'H & P'
            ],
            [
                'name' => 'History',
                'slug' => 'His'
            ],
            [
                'name' => 'language & Culture',
                'slug' => 'L & C'
            ],
            [
                'name' => 'Law',
                'slug' => 'Law'
            ],
            [
                'name' => 'Litterature',
                'slug' => 'Litt'
            ],
            [
                'name' => 'Nature & Envirenment',
                'slug' => 'N & E'
            ],
            [
                'name' => 'Online & Digital',
                'slug' => 'O & D'
            ],
            [
                'name' => 'Politics',
                'slug' => 'Pol'
            ],
            [
                'name' => 'Mathematics',
                'slug' => 'Math'
            ],
            [
                'name' => 'Sports',
                'slug' => 'Sp'
            ],
            [
                'name' => 'Cooking',
                'slug' => 'Cook'
            ],
            [
                'name' => 'Sciences',
                'slug' => 'Sci'
            ],
            [
                'name' => 'Racing',
                'slug' => 'Race'
            ],
        ]);
    }
}
