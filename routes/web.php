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


                return view('studentHome');

        }else{

            $users['users'] = \App\User::all();
            return view('admin.adminHome',$users);

        }
    });




});

Route::get('/profile', 'HomeController@profile')->name('profile');


Route::get('/enrollStudent', 'AddStudent@showForm');
Route::post('/upload', 'AddStudent@insert');
Route::post('/updateStudent', 'UpdateStudentsDetailsController@update');
Route::get('/viewStudent', 'UpdateStudentsDetailsController@view');


Route::get('/companyRegister', 'CompanyController@showForm');
Route::post('/registCompany', 'CompanyController@insert');
Route::get('/viewCompany', 'CompanyController@viewCompanies');

Route::get('/PDCRegister', 'PDCController@showForm');
Route::post('/registPDC', 'PDCController@insert');
Route::get('/viewPDC', 'PDCController@viewPDC');

Route::get('/viewCvs', 'StudentController@viewCvs');



Route::get('/viewStudents', 'AddStudent@viewStudents');

Route::view('/hpage', 'studentHome');
