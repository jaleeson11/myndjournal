<?php

use Illuminate\Database\Seeder;

class DayRatingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('day_ratings')->insert(
			[
				[
					'dr_name' => 'Awesome',
					'dr_image' => file_get_contents('public/images/day-ratings/awesome.png'),
				],
				[
					'dr_name' => 'Completely Okay',
					'dr_image' => file_get_contents('public/images/day-ratings/completely-okay.png'),
				],
				[
					'dr_name' => 'Pretty Good',
					'dr_image' => file_get_contents('public/images/day-ratings/pretty-good.png'),
				],
				[
					'dr_name' => 'Really Terrible',
					'dr_image' => file_get_contents('public/images/day-ratings/really-terrible.png'),
				],
				[
					'dr_name' => 'Somewhat Bad',
					'dr_image' => file_get_contents('public/images/day-ratings/somewhat-bad.png'),
				],
			]
		);
    }
}
