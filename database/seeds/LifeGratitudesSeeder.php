<?php

use Illuminate\Database\Seeder;

class LifeGratitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('life_gratitudes')->insert(
            [
                [
                    'lgr_name' => 'Education',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/education.png'),
                ],
                [
                    'lgr_name' => 'Exercise',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/exercise.png'),
                ],
                [
                    'lgr_name' => 'Food',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/food.png'),
                ],
                [
                    'lgr_name' => 'Friends',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/friends.png'),
                ],
                [
                    'lgr_name' => 'Home',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/home.png'),
                ],
                [
                    'lgr_name' => 'Pets',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/pets.png'),
                ],
                [
                    'lgr_name' => 'Relationship',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/relationship.png'),
                ],
                [
                    'lgr_name' => 'Travel',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/travel.png'),
                ],
                [
                    'lgr_name' => 'Work',
                    'lgr_image' => file_get_contents('public/images/life-gratitudes/work.png'),
                ],
            ]
        );
    }
}
