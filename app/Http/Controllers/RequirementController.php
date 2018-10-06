<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requirement;
use App\NewRequirement;
use Illuminate\Support\Facades\DB;

class RequirementController extends Controller
{
    public function view()
    {


        $companyRequirement =  DB::table('company_requirements')
            ->select('*')
            ->join('requirements','requirements.requirementId','=','company_requirements.requirementId')
            ->join('companies', 'companies.username', '=', 'company_requirements.companyId')
            ->get();

        $requirement = Requirement::all();
        $newrequirement = NewRequirement::all();

        return view('admin.companyRequirement')
            ->with('requirement', $requirement)
            ->with('companyRequirement', $companyRequirement)
        ->with('newrequirement', $newrequirement);

    }

    public function createRequirement(Request $request)
    {

        $specialized = $request->specialized;
        $requirement = $request->requirement;

//        dd($requirement.'-'.$specialized);
        $requir = $requirement.'-'.$specialized;
        $requirements = new Requirement();

        //$requirements->requirementId = $requirementId;
        $requirements->requirement = $requir;


        $requirements->save();
        return redirect()->back()->with('message', ' New Requirement added.. ');



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


        DB::table('requirements')->where('requirementId', $id)
                                ->delete();

        return redirect('admin/requirement');


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
