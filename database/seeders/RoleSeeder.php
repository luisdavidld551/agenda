<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $rol_data = [
            ['name'=> 'Administrador'],
            ['name'=> 'Cliente']
        ];

        foreach ($rol_data as $record) {
            //DB::table('rol')->insert($record);
            $rol = new Role($record);
            $rol->save();   //php artisan db:seed --class=RolSeeder
        }
    }
}
