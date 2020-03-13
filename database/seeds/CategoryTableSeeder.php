<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $catgorys = array('General', 'Agile', 'cloud', 'Technology', 'AI-ML', 'Sport', 'Blockchain', 'News And Events', 'Other');
        foreach ($catgorys as $cat) {
            DB::table('category')->insert([
                'name' => $cat,
            ]);
        }
    }

}
