<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create(array(
			'first_name' => "Bekka",
			'last_name' => 'Allen',
			'email' => 'emeraldentropy@gmail.com',
			'password' => Hash::make('5r1kz94pr')
			));
	}

}
