<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users_data=[
            [
                'name' => 'Luis David',
                'email' => 'luisdavidld551@gmail.com',
                'password' => bcrypt('12345678'),
                'estado' => 'activo',
                'role_id' => '1',
            ],
            [
                'name' => 'Samuel',
                'email' => 'prueba@gmail.com',
                'password' => bcrypt('12345678'),
                'estado' => 'inactivo',
                'role_id' => '2',
            ]
        ];

        foreach ($users_data as $record) {
            $users = new User($record);
            $users->save();
        }
    }
}
