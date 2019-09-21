<?php

use App\User;
use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $user = User::find(1);
        if($user != null) $user->delete();

        $user = User::where('email','=','slimani.m1993@gmail.com')->first();
        if($user != null) $user->delete();

        $faker = Faker\Factory::create();

        $data = [];

        for ($i = 1; $i <= 1 ; $i++) {
            array_push($data, [
                'id'       => 1,
                'name'     => 'Mohamed Slimani',
                'email'    => 'slimani.m1993@gmail.com',
                'password' => bcrypt('mohamed s'),
                'role'     => 10,
                'bio'      => $faker->realText(),
            ]);
        }

        User::insert($data);
    }
}
