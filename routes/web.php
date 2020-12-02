<?php

use Illuminate\Support\Facades\Route;
#<---=== For Use AuthController ===----->
use App\Http\Controllers\AuthController;









#<---=== Route For Show Home Page ===----->
Route::get('/', function () {
    return view('home');
});









#<---=== Route For User Signup Submit Request ===----->
Route::post('/upload', [AuthController::class,'uploads']);









#<---=== Route For User Signup Submit Request ===----->
Route::post('/user/signup', [AuthController::class,'user_signup']);

#<---=== Route For User SignIn Submit Request ===----->
Route::post('/user/signin', [AuthController::class,'user_signin']);









#<---=== Route For Show Admin Dashboard ===----->
Route::get('/admin/dashboard', [AuthController::class,'admin_dashboard']);

#<---=== Route For Show Teacher Everything In Admin ===----->
Route::get('/admin/teacher', [AuthController::class,'admin_teacher']);

#<---=== Route For Show Controller Everything In Admin ===----->
Route::get('/admin/controller', [AuthController::class,'admin_controller']);

#<---=== Route For Show Student Everything In Admin ===----->
Route::get('/admin/student', [AuthController::class,'admin_student']);

#<---=== Route For Status Management Request ===----->
Route::post('/admin/status', [AuthController::class,'admin_status']);

#<---=== Route For Teacher Delete ===----->
Route::get('/admin/teacher/delete/{id}', [AuthController::class,'teacher_delete']);

#<---=== Route For Controller Delete ===----->
Route::get('/admin/controller/delete/{id}', [AuthController::class,'controller_delete']);

#<---=== Route For Student Delete ===----->
Route::get('/admin/student/delete/{id}', [AuthController::class,'student_delete']);

#<---=== Route For Admin Logout ===----->
Route::get('/admin/logout', [AuthController::class,'admin_logout']);









#<---===Route For Show Techer Dashboard===----->
Route::get('/teacher/dashboard', [AuthController::class,'teacher_dashboard']);

#<---=== Teacher Exam Part ===----->
Route::get('/teacher/exam', [AuthController::class,'teacher_exam']);

#<---=== Teacher Add Exam ===----->
Route::post('/teacher/add_exam', [AuthController::class,'add_exam']);

#<---=== Teacher Edit Exam ===----->
Route::get('/teacher/exam/edit/{id}', [AuthController::class,'edit_exam']);

#<---=== Teacher Edit Exam Update===----->
Route::post('/teacher/edit_exam', [AuthController::class,'edit_exam_update']);

#<---=== Teacher Exam Delete ===----->
Route::get('/teacher/exam/delete/{id}', [AuthController::class,'examdeletes']);

#<---=== Teacher Exam Question ===----->
Route::post('/exam/question', [AuthController::class,'exam_question']);

#<---=== Teacher Exam Status Manage ===----->
Route::post('/exam/status', [AuthController::class,'exam_status']);

#<---===  Teacher View Question ===----->
Route::get('/view_question/{id}', [AuthController::class,'view_queston']);

#<---=== Teacher Question Delete ===----->
Route::get('/teacher/question/delete/{id}', [AuthController::class,'questions_deletes']);

#<---=== Teacher Logout ===----->
Route::get('/teacher/logout', [AuthController::class,'teacher_logout']);









#<---=== Student Dashboard ===----->
Route::get('/student/dashboard', [AuthController::class,'student_dashboard']);

#<---=== Show Student Exam Information===----->
Route::get('/student/exam', [AuthController::class,'student_exam']);

#<---=== Student Join Exam ===----->
Route::get('/student/join_exam/{id}', [AuthController::class,'join_exam']);

#<---=== Student Submit Exam Question===----->
Route::post('/student/submit_question', [AuthController::class,'submit_question']);

#<---=== Showt Single Exam Result ===----->
Route::get('/student/show_result/{exam}/{id}', [AuthController::class,'show_result']);

#<---=== Show All Result For Student ===----->
Route::get('/student/result', [AuthController::class,'student_result']);

#<---=== Student Logout ===----->
Route::get('/student/logout', [AuthController::class,'student_logout']);









#<---=== Controller Dashboard ===----->
Route::get('/controller/dashboard', [AuthController::class,'controller_dashboard']);

#<---=== Controller Student Manage ===----->
Route::get('/controller/student', [AuthController::class,'controller_student']);

#<---=== Controller Logout ===----->
Route::get('/controller/logout', [AuthController::class,'controller_logout']);









#<---=== Route For Email Verify ===----->
Route::get('/{who}/{email}/{vkey}', [AuthController::class,'gmail_verify']);

#<---=== Route For Reset Password Link ===----->
Route::post('/reset/link', [AuthController::class,'resets_link']);

#<---=== Show Reset Password Form ===----->
Route::get('/reset/{who}/{email}/{vkey}', [AuthController::class,'reset_password']);

#<---=== Reset Password Update ===----->
Route::post('/reset/password/confirm', [AuthController::class,'reset_password_confirm']);















