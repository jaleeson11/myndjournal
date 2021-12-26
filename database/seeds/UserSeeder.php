<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->insert([
			'name' => 'Test User',
			'email' => 'test@myndjournal.co.uk',
			'password' => 'myndjournal123',
		]);
	}
}
