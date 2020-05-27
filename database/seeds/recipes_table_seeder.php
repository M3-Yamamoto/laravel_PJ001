<?php

use Illuminate\Database\Seeder;

class recipes_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'name' => 'Ramen',
            'ingredients' => 'salt,noodles,meat',
            'category' => 'Japanese Food',
        ]);
    }
}
