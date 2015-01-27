<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$user = new User;
		$user->firstname    = 'Vesko';
		$user->lastname     = 'Vujovic';
		$user->email        = 'veskovujovic@yahoo.com';
		$user->password     = Hash::make('kolakola');
		$user->telephone    = '83284788483';
		$user->admin        = '1';
		$user->save();

	}

}