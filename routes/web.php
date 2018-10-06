<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>['web','auth']],function(){
//    Route::get('/',function(){
//        return view('welcome');
//    });

    Route::get('/home',function(){
        if(Auth::user()->usertype == "user" ){

            return view('userHome');

        }elseif(Auth::user()->usertype == "company" ){

            return view('companyHome');

        }if(Auth::user()->usertype == "student" ){


            $id = Auth::user()->username;


            $interviewedlists = DB::table('interviewed_lists')
                ->select('*')
                ->join('requirements','requirements.requirementId','=','interviewed_lists.requirementId')
                ->join('companies','companies.username','=','interviewed_lists.companyId')
                ->where('registration_no',$id)
                ->get();

            $receivedList = DB::table('received_lists') /// can be change
            ->select('*')
                ->where('registration_no', $id)
                ->get();

            $receive= DB::table('received_lists')
                ->get();

            $intern = DB::table('intern_lists')
                ->select('*')
                ->join('companies','companies.username','=','intern_lists.companyId')
                ->join('requirements','requirements.requirementId','=','intern_lists.requirementId')
                ->where('intern_lists.registration_no',$id)
                ->get();

            $intern_l = DB::table('intern_lists')
                ->select('*')
                ->join('companies','companies.username','=','intern_lists.companyId')
                ->join('requirements','requirements.requirementId','=','intern_lists.requirementId')
                ->where('intern_lists.registration_no',$id)
                ->first();

            $receivedCount = $receivedList->count();

            if($receive->count() != 0){
                if($interviewedlists->isEmpty()){

//            dd($interviewCount->count());
                    if ($receivedCount == 0){
                        return view('student.StudentHome_2');
                    }else{

                        return view('student.StudentHome_1')->with('ReceivedCount', $receivedCount);
                    }
//
//            return view('student.viewStudentPreference')->with('Requirements', $Requirements)->with('SrudentPreformance',$studentPreferences);
                }else{
//            dd($id,$intern,$intern->count());

                    if($intern->count() == 0){
                        return view('student.StudentHome')->with('Interviewedlists', $interviewedlists);
                    }else{
                        return view('student.StudentHome_3')->with('Intern', $intern_l);
                    }
//            return view('student.viewStudentPreferencesForm')->with('Requirements', $Requirements);
                }
            }else{
                return view('student.StudentHome_4');
            }

        }else{

            $users['users'] = \App\User::all();
            return view('admin.adminHome',$users);

        }
    });




});

Route::get('/profile', 'HomeController@profile')->name('profile');


Route::get('/enrollStudent', 'AddStudent@showForm');
Route::post('/uploa', 'AddStudent@insert');
Route::post('/updateStudent', 'UpdateStudentsDetailsController@update');
Route::get('/viewStudent', 'UpdateStudentsDetailsController@view');
//dharana
Route::get('/enrollStudent', 'AddStudent@showForm');
Route::post('/uploa', 'AddStudent@insert');
Route::post('/updateStudentDetails', 'StudentController@updateStudentDetails');
Route::get('/viewStudentDetailsForm/{id}', 'StudentController@viewStudentDetailsForm');
Route::get('/viewStudentPreference', 'StudentController@viewStudentPreferences');
Route::get('/viewStudentPreferences/{id}', 'StudentController@viewStudentPreferencesForm');
Route::get('/home/{id}', 'StudentController@viewStudentInterviews');
Route::get('/studentTask/{id}', 'StudentController@studentTask');
Route::get('/changePreferences/{id}', 'StudentController@editStudentPreferences');
Route::get('/taskRemove/{id}/{id1}/{id2}', 'StudentController@viewDeleteStudentTask');

Route::post('/setStudentPreferences', 'StudentController@setStudentPreferences');
Route::post('/editTask', 'StudentController@editTask');
Route::post('/deleteTask', 'StudentController@deleteTask');
Route::post('/updateStudentTaskView', 'StudentController@updateStudentTaskView');
Route::post('/updateStudentPreferences', 'StudentController@updateStudentPreferences');
Route::post('/addTask', 'StudentController@addTask');


//
Route::get('/admin/requirement', 'RequirementController@view');
Route::post('/admin/createrequirement', 'RequirementController@createRequirement');
Route::get('/admin/requirement/show', 'RequirementController@showRequirement');
Route::get('/admin/requirement/edit/{id}', 'RequirementController@editRequirement');
Route::post('/admin/requirement/update/{id}', 'RequirementController@updateRequirement');
Route::get('/admin/requirement/delete/{id}', 'RequirementController@deleteRequirement');

Route::get('/viewStudents', 'AddStudent@viewStudents');
Route::get('/viewStudentProfile/{registration_no}', 'StudentController@view');
Route::get('/admin/student/task', 'TaskController@taskView');


Route::get('/intern/view', 'InternController@view');
Route::get('/intern/sendCv/{cid}/{rid}/{vacancies}', 'InternController@sendCv');
//Route::get('/intern/viewSentCv', 'InternController@viewSentCv');

Route::get('/companyRegister', 'CompanyController@showForm');
Route::post('/registCompany', 'CompanyController@insert');
Route::get('/viewCompany', 'CompanyController@viewCompanies');
Route::get('/viewCompanyProfile/{username}', 'CompanyController@view');
Route::get('/requirement/{username}', 'CompanyController@viewRequirement');
Route::post('/company/selectRequirement', 'CompanyController@selectRequirement');
Route::get('/company/removeRequirement/{id}/{cid}', 'CompanyController@removeRequirement');
Route::post('/company/newRequirement', 'CompanyController@newRequirement');
Route::get('/company/viewCv/{username}', 'CompanyController@viewCv');
Route::post('/company/viewCv/confirm', 'CompanyController@confirm');
Route::post('/company/viewCv/call', 'CompanyController@call');
Route::get('/company/interview/{username}', 'CompanyController@interview');
Route::post('/company/interview/confirm', 'CompanyController@confirmIntern');
Route::post('/company/interview/select', 'CompanyController@selectForIntern');
Route::get('/company/rejectCV/{rid}/{cid}', 'CompanyController@rejectCV');




Route::get('/PDCRegister', 'PDCController@showForm');
Route::post('/registPDC', 'PDCController@insert');
Route::get('/viewPDC', 'PDCController@viewPDC');

Route::get('/viewCvs', 'StudentController@viewCvs');





Route::view('/hpage', 'studentHome');
