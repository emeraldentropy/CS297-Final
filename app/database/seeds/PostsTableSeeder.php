<?php

class PostsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Post::create(array(
			'post_title' => "Have a Happy Day",
			'post_body' => 'Welcome family! I wish you all the 
			best day :)',
			'post_author' => '3'
			));
		Post::create(array(
			'post_title' => "Up To Two Posts",
			'post_body' => 'Hey everybody! We need more posts! :)',
			'post_author' => '3'
			));
	}

}
