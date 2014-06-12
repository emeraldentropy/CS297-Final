<?php

class CommentsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Comment::create(array(
			'profile_id' => "8",
			'user_id' => '7',
			'text' => 'This is the first comment on the site!'
			));
	}

}
