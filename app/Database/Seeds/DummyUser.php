<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DummyUser extends Seeder
{
    public function run()
    {
        $UserModel = model("UserModel");
        $faker = \Faker\Factory::create('id_ID');

        for ($count = 0; $count < 10; $count++) {
            $user = [
                'username' => $faker->name(),
                'password' => $faker->password(2, 6),
                'email' => $faker->email(),
            ];

            $UserModel->insert($user);
        }
    }
}
