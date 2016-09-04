<?php
class CommentTableSeeder extends Seeder {

	public function run() {
		DB::table('comments')->delete();

		Comment::create(array(
				'name'     => 'Sanjay Karmacharya',
				'email'    => 'sanjay@sanjay.com',
				'password' => md5('sanjay'),
			));

		Comment::create(array(
				'name'     => 'Dinesh Karki',
				'email'    => 'dinesh@dinesh.com',
				'password' => md5('dinesh'),

			));

		Comment::create(array(
				'name'     => 'Sameer Karmacharya',
				'email'    => 'sameerkarmacharya37@gmail.com',
				'password' => md5('sameer'),
			));
	}

}
