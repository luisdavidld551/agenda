<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('user')->get();
        return response()->json($tasks,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required | max:255',
            'estado' => 'required'
        ]);

        $tasks = Task::create($request->all());
        return response()->json($tasks,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::with('user')->findOrFail($id);
        return response()->json($tasks,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Task::findOrFail($id)->update($request->all());
        $tasks = "Task actalizada";
        return response()->json($tasks,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        $tasks = "Tarea con el id: ${id} ha sido eliminada";
        return response()->json($tasks,200);
    }

    public function taskAsignadas()
    {
        $tasks = Task::orderBy('estado','asc')->with('user')->where('user_id', auth()->user()->id)->get();
        return response()->json($tasks,200);
    }
}
//php artisan make:migration create_tasks_users_table