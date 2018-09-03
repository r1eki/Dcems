<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create();
    	foreach (range(1,50) as $index) {
	        \DB::table('users')->insert([
	        	'uuid' => Uuid::uuid4()->getHex(),
	            'name' => $faker->name,
	            'email' => $faker->email,
	            'password' => bcrypt('admin'),
	            'role_id' => 1,
	            'username' => $faker->username,
	            'gender' => 'L',
	            'phone' => $faker->phoneNumber,
	            'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now')
	        ]);
	    }

	    $role = ['admin', 'writter', 'member'];
	    for ($i = 0; $i < 3; $i++) {
	    	\DB::table('roles')->insert([
	    		'name' => $role[$i]
	    	]);
	    }
    }
}
