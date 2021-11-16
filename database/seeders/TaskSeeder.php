<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $task_data = [
            ['nombre'=> 'Guardar sus pertenencias',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Lavar la ropa',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' =>'1'],

            ['nombre'=> 'Doblar y guardar la ropa limpia',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Pasar la aspiradora, barrer, quitar el polvo',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Poner la mesa',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Recoger la mesa',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Lavar y guardar los platos',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Alimentar, sacar a caminar a las mascotas de la familia; limpiar las jaulas de las aves y limpiar los areneros',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Trapear los pisos',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Limpiar el lavabo, el inodoro, la tina del baño, la ducha',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Preparar sus propias loncheras para la escuela',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> ' Hacer el jardín',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],

            ['nombre'=> 'Lavar el auto familiar',
            'descripcion' => 'Aqui va la descripción',
            'estado' => 'sin asignar',
            'user_id' => null],
        ];

        foreach ($task_data as $record) {
            $task = new Task($record);
            $task->save();
        }
    }

}
