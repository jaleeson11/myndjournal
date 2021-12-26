<?php

use Illuminate\Database\Seeder;

class EmotionsSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('emotions')->insert([
			[
				'em_name' => 'Anxious',
				'em_image' => file_get_contents('public/images/emotions/043-nervous-3.png'),
			],
			[
				'em_name' => 'Angry',
				'em_image' => file_get_contents('public/images/emotions/083-angry.png'),
			],
			[
				'em_name' => 'Guilty',
				'em_image' => file_get_contents('public/images/emotions/038-sad-4.png'),
			],
			[
				'em_name' => 'Sad',
				'em_image' => file_get_contents('public/images/emotions/050-sad-2.png'),
			],
			[
				'em_name' => 'Grateful',
				'em_image' => file_get_contents('public/images/emotions/094-happy-2.png'),
			],
			[
				'em_name' => 'Excited',
				'em_image' => file_get_contents('public/images/emotions/074-happy-6.png'),
			],
			[
				'em_name' => 'Depressed',
				'em_image' => file_get_contents('public/images/emotions/071-sad-1.png'),
			],
			[
				'em_name' => 'Panic',
				'em_image' => file_get_contents('public/images/emotions/090-surprised-1.png'),
			],
			[
				'em_name' => 'Ashamed',
				'em_image' => file_get_contents('public/images/emotions/035-sad-5.png'),
			],
			[
				'em_name' => 'Happy',
				'em_image' => file_get_contents('public/images/emotions/051-happy-12.png'),
			],
			[
				'em_name' => 'Embarrassed',
				'em_image' => file_get_contents('public/images/emotions/043-nervous-3.png'),
			],
		]);
	}
}
