<?php

use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('students/create',[StudentController::class,'create_students']);
Route::get('getAllStudents',[StudentController::class,'getAllStudents']);
Route::get('students/{id}',[StudentController::class,'get_student_by_id']);
Route::put('students/{id}',[StudentController::class,'update_student_record']);
Route::delete('students/{id}',[StudentController::class,'Delete_Student_record']);