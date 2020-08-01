<?php

//use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Distilleries\Expendable\Models\User;

class UsersTableSeeder extends Seeder {

    //public function run()
    //{
    //    $faker = Faker::create();

    //    foreach (range(1, 1) as $index)
    //    {
    //        User::create([
    //            'email'    => $faker->email,
    //            'password' => \Hash::make('password'),
    //            'status'   => true,
    //            'role_id'  => 1,
    //        ]);
    //    }
    //}
    public function run()
    {
        User::create([
            'email'    => 'admin@admin.com',
            'password' => \Hash::make('password'),
            'status'   => true,
            'role_id'  => 1,
        ]);
    }
}