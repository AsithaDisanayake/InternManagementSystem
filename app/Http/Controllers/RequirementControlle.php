<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;

class Requirements extends Controller
{
    public function view()
    {
       $requirement = Requirement::all();
        return view('admin.companyRequirement')
          ->with('requirement', $requirement);

    }

    public function createRequirement(Request $request)
    {

        $requirementId = $request->requirementId;
        $requirement = $request->requirement;



        $requirements = new Requirement();

        $requirements->requirementId = $requirementId;
        $requirements->requirement = $requirement;


        $requirements->save();



    }



    public function viewRequirement()
    {
        $requirement =  Requirement::get();
        return view('admin.companyRequirement')->with('requirement', $requirement);

    }


    public function showRequirement()
    {

        return Requirement::get();

    }

    public function deleteRequirement($id)
    {

         Requirement::destroy($id);

        //return true;


    }



    public function editRequirement($id)
    {
        $requirement =  Requirement::find($id);
        return view('admin.companyRequirement')->with('requirement', $requirement);
    }



    public function updateRequirement($cid)
    {

    }

}
