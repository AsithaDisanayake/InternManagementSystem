<?php
/**
 * Created by PhpStorm.
 * User: dwnad
 * Date: 6/18/2018
 * Time: 10:12 PM
 */

namespace App\Http\Controllers;


//use http\Env\Request;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UpdateStudentsDetailsController extends Controller{

    public function view()
    {
        return view('viewStudent');
    }

    public function update(Request $request){
        //dd($request);
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $nameWithInitials = $request->nameWithInitial;
        $registrationNo = $request->userName;
        $indexNo = $request->indexNumber;
        $email = $request->email;
        $nicNumber = $request->NICNumber;
        $gender = $request->gender;
        $address = $request->address;
        $mobile = $request->mobileNumber;
        $cv = $request->file('uploadCV');

        $cvName = $cv->getClientOriginalName();
        $cv->storeAs('public/upload',$registrationNo);
        $path = 'public/upload/'.$registrationNo;


//
//        $student = new Student();
//        $student->registration_no = $registrationNo;
//        $student->indexNo = $indexNo;
//        $student->firstName = $firstName;
//        $student->lastName = $lastName;
//        $student->nameWithInit = $nameWithInitials;
//        $student->gender = $gender;
//        $student->nic = $nicNumber;
//        $student->email = $email;
//        $student->address = $address;
//        $student->contactNo = $mobile;
//        $student->cv = $cvName;
//        $student->save();

        DB::table('students')
            ->where('registration_no',$registrationNo)
            ->update(['indexNo'=>$indexNo,'firstName'=>$firstName,'lastName'=>$lastName,'nameWithInit'=>$nameWithInitials,'gender'=>$gender,'nic'=>$nicNumber,'email'=>$email,'address'=>$address,'contactNo'=>$mobile,'cv'=>$path]);

        DB::table('users')
            ->where('username',$registrationNo)
            ->update(['email'=>$email]);


        return redirect()->back()->with('message', 'Students successfully Registered.. ');
    }
}