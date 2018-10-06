<?php

namespace App\Http\Controllers;

use App\ReceivedList;
use App\Student;
use Illuminate\Http\Request;
use App\Requirement;
use App\StudentPreference;
use App\InterviewedList;
use Illuminate\Support\Facades\DB;

class InternController extends Controller
{
    public function view()
    {
        $sentCv =  DB::table('received_lists')
            ->select('*')
            ->join('requirements','requirements.requirementId','=','received_lists.requirementId')
            ->join('companies', 'companies.username', '=', 'received_lists.companyId')
            ->join('students', 'students.registration_no', '=', 'received_lists.registration_no')
            ->get();

        $selectedCv =  DB::table('interviewed_lists')
            ->select('*')
            ->join('requirements','requirements.requirementId','=','interviewed_lists.requirementId')
            ->join('companies', 'companies.username', '=', 'interviewed_lists.companyId')
            ->join('students', 'students.registration_no', '=', 'interviewed_lists.registration_no')
            ->get();
        //dd($SelectedCv);

        $companyRequirement =  DB::table('company_requirements')
            ->select('*')
            ->join('requirements','requirements.requirementId','=','company_requirements.requirementId')
            ->join('companies', 'companies.username', '=', 'company_requirements.companyId')
            ->get();

        $requirement = Requirement::all();

        return view('intern.sendCV')
            ->with('requirement', $requirement)
            ->with('companyRequirement', $companyRequirement)
            ->with('sentCv', $sentCv)
            ->with('selectedCv', $selectedCv);

    }





    public function sendCv($companyId,$requirementId,$vacancies)
    {



        $vacancies = $vacancies +5;
        $studentPreference = [];
        $interviewedList = [];
        $failedList = [];


        $student_preferences = DB::table('student_preferences')->where('requirementId', $requirementId)
                                                                 ->where('selected', 0)
                                                                ->get()->toArray();
        $interviewed_lists = DB::table('interviewed_lists')->get()->toArray();


//        create array of student list according to company requirement
        foreach($student_preferences as $row){
           $a =  $row->registration_no;
            array_push($studentPreference,$a);
        }
//        create array of student list interviewed called
        foreach($interviewed_lists as $row){
            $b =  $row->registration_no;
            array_push($interviewedList,$b);
        }

// select not interviewed array list according to requirements
        $notInterviewed = array_values(array_diff($studentPreference,$interviewedList));

        $notInterviewedLength =  sizeof($notInterviewed);
       // dd($notInterviewedLength);

        if($notInterviewedLength >= $vacancies){

            $rand_keys = array_rand($notInterviewed,$vacancies);

           for($i=0; $i < sizeof($rand_keys); $i++){
               $receievedCV1 = new ReceivedList();
               $receievedCV1->companyId = $companyId;
               $receievedCV1->registration_no =  $notInterviewed[$rand_keys[$i]];
               $receievedCV1->year = date("Y");
               $receievedCV1->requirementId = $requirementId;
               $receievedCV1->save();

           }
            return redirect()->back()->with('message', 'Cvs Sent.. ');

        }else{
                if($notInterviewedLength != 0){
//                send all notInterviewed list to receivedcv
            for($j=0; $j < $notInterviewedLength; $j++) {
                $receievedCV2 = new ReceivedList();
                $receievedCV2->companyId = $companyId;
                $receievedCV2->registration_no = $notInterviewed[$j];
                $receievedCV2->year = date("Y");
                $receievedCV2->requirementId = $requirementId;
                $receievedCV2->save();

            }
                return redirect()->back()->with('message', 'Cvs Sent.. ');
            }
            //send cv from interview fail list
            $failed_lists = DB::table('failed_lists')->get()->toArray();
            $failedlistlength = sizeof($failed_lists);
            //        create array of interview fail list according to company requirement
            foreach($failed_lists as $row){
                $c =  $row->registration_no;
                array_push($failedList,$c);
            }

            $notEnough = $vacancies - $notInterviewedLength;


            if($notEnough <= $failedlistlength ){
                $rand_keys2 = array_rand($failed_lists,$notEnough);


                    for ($i = 0; $i < sizeof($rand_keys2); $i++) {
                        $receievedCV3 = new ReceivedList();
                        $receievedCV3->companyId = $companyId;
                        $receievedCV3->registration_no = $failedList[$rand_keys2[$i]];
                        $receievedCV3->year = date("Y");
                        $receievedCV3->requirementId = $requirementId;
                        $receievedCV3->save();


                }
                return redirect()->back()->with('message', 'Cvs Sent.. ');

            }else if($notEnough > $failedlistlength &&  $failedlistlength != 0){
                //send all fail list to receivedList

                    for ($j = 0; $j < $notInterviewedLength; $j++) {
                        $receievedCV4 = new ReceivedList();
                        $receievedCV4->companyId = $companyId;
                        $receievedCV4->registration_no = $failedList[$j];
                        $receievedCV4->year = date("Y");
                        $receievedCV4->requirementId = $requirementId;
                        $receievedCV4->save();


                }
                return redirect()->back()->with('message', 'Cvs Sent.. ');
            }

        }


    }

}
