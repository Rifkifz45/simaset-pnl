<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 100; $i++) { 
            //to add 10 products. Change limit as desired
            $this->db->table('tabel-users')->insert($this->addUser());
        }
        
    }

    private function addUser(): array
    {
        $faker = \Faker\Factory::create('id_ID');
        $avatar = [
            'avatars.png',
            'avatars1.png',
            'avatars2.png',
            'avatars3.png',
            'avatars4.png',
            'avatars5.png',
        ];
        return $data = [
            'username'  => $faker->userName,
            'password'  => md5($faker->password),
            'salt'      => $faker->bankAccountNumber,
            'nama'      => $faker->name,
            'email'     => $faker->email,
            'telp'      => $faker->phoneNumber,
            'avatar'    => $faker->randomElement($avatar),
            'role'      => $faker->numberBetween(1, 3),
            'created_at'=> Time::createFromTimestamp($faker->unixTime()),
            'created_by'=> $faker->randomElement($array = array (1,2,3)),
            'updated_at'=> Time::now(),
            'updated_by'=> $faker->randomElement($array = array (1,2,3)),
            'status'    => $faker->numberBetween(1, 3),

        ];
    }
}