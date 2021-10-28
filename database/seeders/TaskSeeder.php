<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Exception;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    /**
     * Registros insertados, una lista strings que son el id del registro
     *
     * @var array<string>
     */
    private $insertados=[];
    /**
     * Registros fallidos, una lista de arrays de la forma ['id' => xxx, 'message' => yyy]
     *
     * @var array<array{id:string,message:string}>
     */
    private $fallidos=[];

    public function run()
    {
        $task_data = [
            ['nombre'=> 'Juan',
            'descripcion' => 'Bien o no',
            'estado' => 'Mal'],
            ['nombre'=> 'Andres',
            'descripcion' => 'Bien o no',
            'estado' => 'Bien'],
            ['nombre'=> 'Camilo',
            'descripcion' => 'Bien o no',
            'estado' => 'Mal'],
            ['nombre'=> 'Eduardo',
            'descripcion' => 'Bien o no',
            'estado' => 'Bien'],
        ];

        //$task = new Task($task_data);
        //$task->save();

        foreach ($task_data as $record) {
            $this->attemptInsertion($record);
        }
        dump([
            'insertados'=>$this->insertados,
            'fallidos'=>$this->fallidos
        ]);

    }
    private function attemptInsertion(array $record):void
    {
        try {
            $task = new Task($record);
            $task->save();

            //DB::table('tasks')->insert($record);
            $this->insertados[]=$record['nombre'];
        } catch (Exception $exception) {
            $this->fallidos[]=[
                'id'=>$record['nombre'],
                'message'=>$exception->getMessage()
            ];
            
        }
    }
}
