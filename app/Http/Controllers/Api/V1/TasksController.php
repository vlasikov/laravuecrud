<?php

namespace App\Http\Controllers\Api\V1;

use App\Task;
use App\TaskFactory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = [];
        $modelTask = TaskFactory::getModel('db');
        $resultDB = $modelTask::all();
        if ($resultDB) {
            foreach ($resultDB as $res) {
                $result[] = $res;
            }
        }

        $modelTask = TaskFactory::getModel('file');
        $resultFile = $modelTask::all();
        if ($resultFile) {
            foreach ($resultFile as $res) {
                $result[] = $res;
            }
        }
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $space = $request->input('space');
        $modelTask = TaskFactory::getModel($space);
        return $modelTask::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // return Task::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        // $task = Task::findOrFail($id);
        // $task->update($request->all());
 
        // return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $task = Task::findOrFail($id);
        // $task->delete();
        // return '';
    }
}
