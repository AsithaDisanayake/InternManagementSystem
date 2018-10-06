<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function taskView()
    {


        $task  = DB::table('tasks')
            ->join('companies','companies.username','=','tasks.companyId')
            ->join('students','students.registration_no','=','tasks.registration_no')
           // ->join('students','students.registration_no','=','tasks.registration_no')

            ->get();
     // dd($task);
        return view('admin.taskView')->with('task', $task)
            ->with('task',$task );

    }
}
