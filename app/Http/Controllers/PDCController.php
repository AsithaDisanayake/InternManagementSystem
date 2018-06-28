<?php

namespace App\Http\Controllers;

use App\PDC;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PDCController extends Controller
{
    public function showForm()
    {
        return view('admin.registerPDC');
    }

    public function viewPDC()
    {
        $pdc = PDC::all();
        return view('admin.viewPDC')->with('pdc', $pdc);

    }



    public function insert(Request $request)
    {
        $username = $request->username;
        $fullName = $request->fullName;
        $email = $request->email;
        $address = $request->address;
        $contactNo = $request->contactNo;
        $password = "user@123";
        $usertype = "user";


        //Add COMPANY to user table

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->usertype=$usertype;
        $user->password = Hash::make($password);
        $user->save();


        //Add company to Company table
        $company = new PDC();
        $company->username = $username;
        $company->fullName = $fullName;
        $company->email = $email;
        $company->address = $address;
        $company->contactNo = $contactNo;
        $company->save();




        // Send password to Company
        $loggingDetails = array('name'=>$fullName, 'username'=>$username, 'password'=>$password);
        $edata = array( 'email' => $email);
        Mail::send(['text'=>'mail'],$loggingDetails,function($message)use ($edata){

            $message->to($edata['email'],'to student')->subject('password');
            $message->from('internmanagement.pdc@gmail.com','PDC Test');


        });
        return redirect()->back()->with('message', 'user successfully Registered.. ');
        //return redirect('companyRegister');

    }

}
