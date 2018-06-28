<?php

namespace App\Http\Controllers;
use App\Company;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    public function showForm()
    {
        return view('admin.registerCompany');
    }

    public function viewCompanies()
    {
        $company = Company::all();
        return view('admin.viewCompanies')->with('company', $company);

    }



    public function insert(Request $request)
    {
        $username = $request->username;
        $companyName = $request->companyName;
        $email = $request->email;
        $address = $request->address;
        $contactNo = $request->contactNo;
        $password = "company@123";
        $usertype = "company";


        //Add COMPANY to user table

        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->usertype=$usertype;
        $user->password = Hash::make($password);
        $user->save();


        //Add company to Company table
        $company = new Company();
        $company->username = $username;
        $company->companyName = $companyName;
        $company->email = $email;
        $company->address = $address;
        $company->contactNo = $contactNo;
        $company->save();




        // Send password to Company
        $loggingDetails = array('name'=>$companyName, 'username'=>$username, 'password'=>$password);
        $edata = array( 'email' => $email);
        Mail::send(['text'=>'mail'],$loggingDetails,function($message)use ($edata){

            $message->to($edata['email'],'to student')->subject('password');
            $message->from('internmanagement.pdc@gmail.com','PDC Test');


        });
        return redirect()->back()->with('message', 'Company successfully Registered.. ');
        //return redirect('companyRegister');

        }




}
