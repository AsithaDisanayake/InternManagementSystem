<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use App\BatchEnroll;
use Illuminate\Mail\MailServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AddStudent extends Controller
{

    public function showForm()
    {
        return view('admin/insertStudent');
    }

    public function viewStudents()
    {
        $student = Student::all();
        return view('admin.viewStudents')->with('student', $student);

    }

    public function insert(Request $request)
    {
        $batch = $request->batch;
        $upload=$request->file('upload-file');
        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');
        $header= fgetcsv($file);

        //looping through other columns
        while($columns=fgetcsv($file))
        {
            if($columns[0]=="")
            {
                continue;
            }

            $data= array_combine($header, $columns);

            // Table update
            $registration_no=$data['registration_no'];
            $name=$data['name'];
            $email=$data['email'];

            $BatchEnroll= BatchEnroll::firstOrNew(['registration_no'=>$registration_no,'name'=>$name]);
            $BatchEnroll->registration_no=$registration_no;
            $BatchEnroll->name=$name;
            $BatchEnroll->email=$email;
            $BatchEnroll->batch=$batch;
            $BatchEnroll->save();

            //Add students to user table

            $user = new User();
            $user->username = $registration_no;
            $user->email = $email;
            $user->usertype='student';
            $user->password = Hash::make('ucsc@123');
            $user->save();


            //Add students to Students table
            $student = new Student();
            $student->registration_no = $registration_no;
            $student->email = $email;
            $student->nameWithInit = $name;
            $student->save();




            // Send password to Student
            $loggingDetails = array('name'=>$name, 'username'=>$registration_no, 'password'=>'ucsc@123');
            $edata = array( 'email' => $email);
           Mail::send(['text'=>'mail'],$loggingDetails,function($message)use ($edata){

               $message->to($edata['email'],'to company')->subject('password');
               $message->from('internmanagement.pdc@gmail.com','PDC Test');


           });

        }

        return redirect()->back()->with('message', 'Students successfully Registered.. ');
    }
}
