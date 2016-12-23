<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
		
		while($i < 50)
		{
        DB::table('films')->insert([
			'name' => str_random(10), 
			'year' => date('Y-m-d'),
			'mins' => rand(30, 300)
		]);
			$i++;
		}
    }
}
