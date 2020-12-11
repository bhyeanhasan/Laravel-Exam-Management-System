<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
use File;
use PDF;


#<---=== Include Model To Work With Database ===----->
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Result;


use Session;#<---=== To Work With Session ===----->
use DB;

use Mail;#<---=== To Work With Mail ===----->
use App\Mail\VerifyMail;#<---=== To Work With Account Verification Link ===----->
use App\Mail\ResetLink;#<---=== To Work With Reset Password Link ===----->
use App\Mail\Warnings;#<---=== To Work With Any kindof changing alert ===----->



class AuthController extends Controller
{
    #<---=== Route For User Signup Submit Request ===----->
    public function user_signup(Request $request)
    {
        #<---======  Genarate 5 digit unique key =======----->
        $vkey = 'abcdefghijklmnopqrstuvwxwzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$*@';
        $vkey = str_shuffle($vkey);
        $vkey = substr($vkey,0,5);
        $details = [
          'who' =>  $request->sup_who,
          'name' => $request->sup_name,
          'email' => $request->sup_email,
          'phone' => $request->sup_phone,
          'vkey' => $vkey
        ];

        #<---======Check, Teacher Send Request Or Not =======----->
        if($request->sup_who == 'teacher')
        {
            #<---======Check Alredy Request Data Avilable Or Not=======----->
            $db_check_id = Teacher::where('tid',$request->sup_id)->value('tid');
            $db_check_email = Teacher::where('email',$request->sup_email)->value('email');
            $db_check_phone = Teacher::where('phone',$request->sup_phone)->value('phone');



            #<---=== If request id already exist then ===----->
            if($db_check_id){
                return response()->json(['error'=>'Teacher Id Already Exists']);
            }
            #<---=== If request email already exist then ===----->
            else if($db_check_email){
                return response()->json(['error'=>'Teacher Email Already Exists']);
            }
            #<---=== If request Phone already exist then ===----->
            else if($db_check_phone){
                return response()->json(['error'=>'Teacher Phone Already Exists']);
            }
            #<---=== request all data are new in database then ===----->
            else{
                #<---=== Send Mail to verify account ===----->
                Mail::to($request->sup_email)->send(new VerifyMail($details));

                    #<---=== Insert Request Data Into Database ===----->
                    $teacher = new Teacher();
                    $teacher->tid = $request->sup_id;
                    $teacher->name = $request->sup_name;
                    $teacher->email = $request->sup_email;
                    $teacher->birth = $request->sup_birth;
                    $teacher->phone = $request->sup_phone;
                    $teacher->photo = 'photo';
                    $teacher->faculty = $request->sup_fac;
                    $teacher->password = $request->sup_pass;
                    $teacher->status = 0;
                    $teacher->vkey = $vkey;
                    $teacher->verify = 0;
                    $teacher->save();
                    
                    #<---=== Return Json Response ===----->
                    return response()->json(['success'=>'A verrification link send your inbox ! Verify Your Email','who'=>$request->sup_who,'tid'=>$request->sup_id]);


            }
            
        }
        #<---======Check, Controller Send Request Or Not =======----->
        else if($request->sup_who == 'controller')
        {
            #<---======Check Alredy Request Data Avilable Or Not=======----->
            $db_check_id = Controller::where('cid',$request->sup_id)->value('cid');
            $db_check_email = Controller::where('email',$request->sup_email)->value('email');
            $db_check_phone = Controller::where('phone',$request->sup_phone)->value('phone');



            #<---=== If request id already exist then ===----->
            if($db_check_id){
                return response()->json(['error'=>' Id Already Exists']);
            }
            #<---=== If request email already exist then ===----->
            else if($db_check_email){
                return response()->json(['error'=>'Email Already Exists']);
            }
            #<---=== If request Phone already exist then ===----->
            else if($db_check_phone){
                return response()->json(['error'=>'Phone Already Exists']);
            }
            #<---=== request all data are new in database then ===----->
            else{
                #<---=== Send Mail to verify account ===----->
                Mail::to($request->sup_email)->send(new VerifyMail($details));

                #<---=== Insert Request Data Into Database ===----->
                $controller = new Controller();
                $controller->cid = $request->sup_id;
                $controller->name = $request->sup_name;
                $controller->email = $request->sup_email;
                $controller->birth = $request->sup_birth;
                $controller->phone = $request->sup_phone;
                $controller->photo = 'photo';
                $controller->faculty = $request->sup_fac;
                $controller->password = $request->sup_pass;
                $controller->vkey = $vkey;
                $controller->status = 0;
                $controller->verify = 0;
                $controller->save();
                    
                #<---=== Return Json Response ===----->
                return response()->json(['success'=>'A verrification link send your inbox ! Verify Your Email','who'=>$request->sup_who,'cid'=>$request->sup_id]);
            }
            
        }
        #<---======Check,Student Send Request Or Not=======----->
        else{
            #<---======Check Alredy Request Data Avilable Or Not=======----->
            $db_check_id = Student::where('sid',$request->sup_id)->value('sid');
            $db_check_email = Student::where('email',$request->sup_email)->value('email');
            $db_check_phone = Student::where('phone',$request->sup_phone)->value('phone');

            #<---=== If request id already exist then ===----->
            if($db_check_id){
                return response()->json(['error'=>'Your Id Already Exists']);
            }
            #<---=== If request email already exist then ===----->
            else if($db_check_email){
                return response()->json(['error'=>'Your Email Already Exists']);
            }
            #<---=== If request Phone already exist then ===----->
            else if($db_check_phone){
                return response()->json(['error'=>'Your Phone Already Exists']);
            }
            #<---=== request all data are new in database then ===----->
            else{
                #<---=== Check Selected Session Value 0 or not ===----->
                if($request->sup_session == "0")
                {
                    return response()->json(['error'=>'Select Your Session']);
                }
                #<---=== Check Selected Semister Value 0 or not ===----->
                else if($request->sup_semister == "0")
                {
                    return response()->json(['error'=>'Select Your Semister']);                   
                }
                #<---=== If Everythig is fine ===----->
                else{
                    #<---=== Send Mail to verify account ===----->
                    Mail::to($request->sup_email)->send(new VerifyMail($details));

                    #<---=== Insert Request Data Into Database ===----->
                    $student = new Student();
                    $student->sid = $request->sup_id;
                    $student->name = $request->sup_name;
                    $student->email = $request->sup_email;
                    $student->birth = $request->sup_birth;
                    $student->phone = $request->sup_phone;
                    $student->password = $request->sup_pass;
                    $student->session = $request->sup_session;
                    $student->semister = $request->sup_semister;
                    $student->photo = 'photo';
                    $student->faculty = $request->sup_fac;
                    $student->vkey = $vkey;
                    $student->status = 0;
                    $student->verify = 0;
                    $student->save();
                    
                    #<---=== Return Json Response ===----->
                    return response()->json(['success'=>'A verrification link send your inbox ! Verify Your Email','who'=>$request->sup_who,'sid'=>$request->sup_id]);
                }
            }
        }
        
    }
    #<---=== Route For User SignIn Submit Request ===----->
    public function user_signin(Request $request)
    {
        #<---======Check,Admin Send Request Or Not=======----->
        if($request->sin_who == 'admin')
        {
            #<---======Check Alredy Request Data Avilable Or Not=======----->
            $db_check_id = Admin::where('aid',$request->sin_id)->value('aid');
            $db_check_email = Admin::where('email',$request->sin_email)->value('email');
            $db_check_pass = Admin::where('password',$request->sin_pass)->value('password');


            #<---===If request id is not exist then===----->
            if(!$db_check_id){
                return response()->json(['error'=>'Your Id Is Not Avilable']);
            }
            #<---===If request email is not exist then===----->
            else if(!$db_check_email){
                return response()->json(['error'=>'Your Email Is Not Avilable']);
            }
            #<---===If request password is not exist then===----->
            else if(!$db_check_pass){
                return response()->json(['error'=>'Your Password Is Not Avilable']);
            }
            #<---===If request all data exist then===----->
            else{
                #<---===To access admin dashboard i create this bcrypt amain_session===----->
                $request->session()->put('amain_session',bcrypt($request->sin_id.$request->sin_email));
                #<---===Also Create This Session===----->
                $request->session()->put('admin_session',$request->sin_id);

                #<---=== Return Json Response ===----->
                return response()->json(['success'=>'You are loged in ! Wait Your Dashboard Is Loading','who'=>$request->sin_who,'aid'=>$request->sin_id]);
            }
            
        }
        #<---======Check,Teacher Send Request Or Not=======----->
        else if($request->sin_who == 'teacher'){

            #<---======Check Alredy Request Data Avilable Or Not=======----->
            $db_check_id = Teacher::where('tid',$request->sin_id)->value('tid');
            $db_check_email = Teacher::where('email',$request->sin_email)->value('email');
            $db_check_status = Teacher::where('tid',$request->sin_id)->value('status');
            $db_check_verify = Teacher::where('tid',$request->sin_id)->value('verify');
            $db_check_pass = Teacher::where('tid',$request->sin_id)->value('password');

            


            

            #<---===If request id is not exist then===----->
            if(!$db_check_id){
                return response()->json(['error'=>'Your Id Is Not Avilable']);
            }
            #<---===If request email is not exist then===----->
            else if(!$db_check_email){
                return response()->json(['error'=>'Your Email Is Not Avilable']);
            }
            #<---===If request pasword Hash is not equal to existing Hash Password then===----->
            else if (!Hash::check($request->sin_pass, $db_check_pass)) {
                return response()->json(['error'=>'Enter Valid Password']);
            }
            #<---===If request Stataus Active Or Not then===----->
            else if($db_check_verify == 0){
                return response()->json(['error'=>'Verfy Your Email ']);
            }
            #<---===If request Stataus Active Or Not then===----->
            else if($db_check_status == 0){
                return response()->json(['error'=>'Your Account Is InActive']);
            }
            #<---===If request all data exist then===----->
            else{
                #<---===Create a Session For User===----->
                $request->session()->put('teacher_session',$request->sin_id);

                #<---=== Return Response ===----->
                return response()->json(['success'=>'You are loged in ! Wait Your Dashboard Is Loading','who'=>$request->sin_who,'tid'=>$request->sin_id]);
            }
        }
        #<---======Check If Controller Send Request Or Not=======----->
        else if($request->sin_who == 'controller'){

            #<---======Check Alredy Request Data Avilable Or Not=======----->
            $db_check_id = Controller::where('cid',$request->sin_id)->value('cid');
            $db_check_email = Controller::where('email',$request->sin_email)->value('email');
            $db_check_pass = Controller::where('email',$request->sin_email)->value('password');
            $db_check_status = Controller::where('cid',$request->sin_id)->value('status');
            $db_check_verify = Controller::where('cid',$request->sin_id)->value('verify');
            
            #<---===If request id is not exist then===----->
            if(!$db_check_id){
                return response()->json(['error'=>'Your Id Is Not Avilable']);
            }
            #<---===If request email is not exist then===----->
            else if(!$db_check_email){
                return response()->json(['error'=>'Your Email Is Not Avilable']);
            }
            #<---===If request pasword Hash is not equal to existing Hash Password then===----->
            else if (!Hash::check($request->sin_pass, $db_check_pass)) {
                return response()->json(['error'=>'Enter Valid Password']);
            }
            #<---===If request Stataus Active Or Not then===----->
            else if($db_check_verify == 0){
                return response()->json(['error'=>'Verfy Your Email ']);
            }
            #<---===If request Stataus Active Or Not then===----->
            else if($db_check_status == 0){
                return response()->json(['error'=>'Your Account Is InActive']);
            }
            #<---===If request all data exist then===----->
            else{
                #<---===Create a Session For User===----->
                $request->session()->put('controller_session',$request->sin_id);

                #<---=== Return Json Response ===----->
                return response()->json(['success'=>'You are loged in ! Wait Your Dashboard Is Loading','who'=>$request->sin_who,'cid'=>$request->sin_id]);
            }
        }
        #<---======Check If Student Send Request Or Not=======----->
        else{
                #<---======Check Alredy Request Data Avilable Or Not=======----->
                $db_check_id = Student::where('sid',$request->sin_id)->value('sid');
                $db_check_email = Student::where('email',$request->sin_email)->value('email');
                $db_check_pass = Student::where('email',$request->sin_email)->value('password');
                $db_check_status = Student::where('sid',$request->sin_id)->value('status');
                $db_check_verify = Student::where('sid',$request->sin_id)->value('verify');
                
                #<---===If request id is not exist then===----->
                if(!$db_check_id){
                    return response()->json(['error'=>'Your Id Is Not Avilable']);
                }
                #<---===If request email is not exist then===----->
                else if(!$db_check_email){
                    return response()->json(['error'=>'Your Email Is Not Avilable']);
                }
                #<---===If request pasword Hash is not equal to existing Hash Password then===----->
                else if (!Hash::check($request->sin_pass, $db_check_pass)) {
                    return response()->json(['error'=>'Enter Valid Password']);
                }
                #<---===If request Stataus Active Or Not then===----->
                else if($db_check_verify == 0){
                    return response()->json(['error'=>'Verfy Your Email ']);
                }
                #<---===If request Stataus Active Or Not then===----->
                else if($db_check_status == 0){
                    return response()->json(['error'=>'Your Account Is InActive']);
                }
                #<---===If request all data exist then===----->
                else{
                    #<---===Create a Session For User===----->
                    $request->session()->put('student_session',$request->sin_id);

                    #<---=== Return Json Response ===----->
                    return response()->json(['success'=>'You are loged in ! Wait Your Dashboard Is Loading','who'=>$request->sin_who,'sid'=>$request->sin_id]);
                }
        }
        
    }











    #<---=== Route For Image File Upload ===----->
    public function uploads(Request $request)
    {
        #<---=== Get Form Value ===----->
        $name = $request->name;
        $image = $request->file('file');
        #<---=== Get image extention ===----->
        $extension =$image->extension();
        #<---=== create custom file mame ===----->
        $imageName = $name.'.'.$image->extension();
        #<---=== check file extention jpeg or not ===----->
        if($extension !== 'jpeg')
        {
           #<---=== Return back with a error message ===----->
           return back()->with('error', 'Image type should be jpg');
        }else{
            #<---=== Check who want to update photo ===----->
            if($request->who == 'admin')
            {
                #<---=== check file already exist or not ===----->
                $old_image_path = public_path("images/admin/$imageName");
                #<---=== If exist, delete this file ===----->
                if(File::exists($old_image_path)) {
                    File::delete($old_image_path);
                }
                #<---=== Move new file inside your specific folder ===----->
                $image->move(public_path('images/admin'), $imageName);
                #<---=== Update photo name ===-----> 
                Admin:: where('aid',Session::get('admin_session'))->update([
                'photo' => $imageName,
                ]);
                return back();
            }
            #<---=== Check who want to update photo ===----->
            else if($request->who == 'teacher')
            {
                #<---=== check file already exist or not ===----->
                $old_image_path = public_path("images/teacher/$imageName");
                #<---=== If exist, delete this file ===----->
                if(File::exists($old_image_path)) {
                    File::delete($old_image_path);
                }
                #<---=== Move new file inside your specific folder ===----->
                $image->move(public_path('images/teacher'), $imageName);
                #<---=== Update photo name ===-----> 
                Teacher:: where('tid',Session::get('teacher_session'))->update([
                'photo' => $imageName,
                ]);
                return back();
            }
            #<---=== Check who want to update photo ===----->
            else if($request->who == 'controller')
            {
                #<---=== check file already exist or not ===----->
                $old_image_path = public_path("images/controller/$imageName");
                #<---=== If exist, delete this file ===----->
                if(File::exists($old_image_path)) {
                    File::delete($old_image_path);
                }
                #<---=== Move new file inside your specific folder ===----->
                $image->move(public_path('images/controller'), $imageName); 
                #<---=== Update photo name ===-----> 
                Controller:: where('cid',Session::get('controller_session'))->update([
                'photo' => $imageName,
                ]);
                return back()->with('update', 'Image Updated');
            }
            else{
                #<---=== check file already exist or not ===----->
                $old_image_path = public_path("images/student/$imageName");
                #<---=== If exist, delete this file ===----->
                if(File::exists($old_image_path)) {
                    File::delete($old_image_path);
                }
                #<---=== Move new file inside your specific folder ===----->
                $image->move(public_path('images/student'), $imageName); 
                #<---=== Update photo name ===-----> 
                Student:: where('sid',Session::get('student_session'))->update([
                'photo' => $imageName,
                ]);
                return back();
            }
        }
    }












    #<---=== Route For Show Admin Dashboard ===----->
    public function admin_dashboard()
    {
        #<---=== Check Admin Loged in or not ===----->
        if(!Session::get('amain_session')){
            return view('404');
            die();
        }else{
            #<---===Get Admin details who is login===----->
            $get = Admin::where('aid',Session::get('admin_session'))->get();
            #<---===Pass Getting data inside below view===----->
            return view('admin.dashboard',compact('get'));
        }
    }
    #<---=== Route For Show Teacher Everything In Admin ===----->
    public function admin_teacher()
    { 
        #<---=== Check Admin Loged in or not ===----->
        if(!Session::get('admin_session'))
        {
            return view('404');
            die();
        }
        else{
           #<---=== Get Teacher Details where teacher verify his account ===----->
           $teacher = Teacher::where('verify','1')->get();
           #<---=== Send this $teacher value, in below view using compact() ===----->
           return view('admin.teacher',compact('teacher'));
        }
    }
    #<---=== Route For Show Controller Everything In Admin ===----->
    public function admin_controller()
    {
        #<---=== Check Admin Loged in or not ===----->
        if(!Session::get('admin_session')){
            return view('404');
            die();
        }else{
            #<---=== Get Controller Details where teacher verify his account ===----->
            $controllers = Controller::where('verify','1')->get();
            #<---=== Send this $controllers value, in below view using compact() ===----->
           return view('admin.controller',compact('controllers'));
        }
    }
    #<---=== Route For Show Student Everything In Admin ===----->
    public function admin_student()
    {
        #<---=== Check Admin Loged in or not ===----->
        if(!Session::get('admin_session')){
            return view('404');
            die();
        }else{
            #<---=== Get Student Details where teacher verify his account ===----->
            $students = Student::where('verify','1')->get();
            #<---=== Send this $students value, in below view using compact() ===----->
            return view('admin.student',compact('students'));
        }
    }
    #<---=== Route For Status Management Request ===----->
    public function admin_status(Request $request)
    {
        #<---=== Pass Two value inside $details.Whose account status is change and warning message For send warning mail purpose ===----->
        $details = [
            'who' =>  $request->who,
            'warning' => " Admin Change Your Account Status"
        ];
        #<---=== Check Teacher status change or not ===----->
        if($request->who == 'teacher')
        {
            #<---=== Get Teacher email where id is come from request ===----->
            $get= Teacher::where('tid',$request->id)->get('email');
            #<---=== Send Warning Mail the getting email===----->
            Mail::to($get)->send(new Warnings($details));
            #<---=== Update Teacher Status value 0===----->
            if($request->status == '1'){  
                    $data = Teacher:: where('tid',$request->id)->update([
                    'status' => '0',
                ]);
                    return redirect()->back();
            }else{
                #<---=== Update Teacher Status value 1===----->  
                $data = Teacher:: where('tid',$request->id)->update([
                    'status' => '1',
                ]);
                return redirect()->back();
            }
        }
        #<---=== Check Teacher status change or not ===----->
        else if($request->who == 'student')
        {
            #<---=== Get Student email where id is come from request ===----->
            $get= Student::where('sid',$request->id)->get('email');
            #<---=== Send Warning Mail the getting email===----->
            Mail::to($get)->send(new Warnings($details));
            #<---=== Update Teacher Status value 0 ===----->
            if($request->status == '1'){  
                    $data = Student:: where('sid',$request->id)->update([
                    'status' => '0',
                ]);
                return response()->json(['who'=>$request->who]);
            }else{  
                #<---=== Update Teacher Status value 1 ===----->
                $data = Student:: where('sid',$request->id)->update([
                    'status' => '1',
                ]);
                return response()->json(['who'=>$request->who]);
            }
        }else if($request->who == 'exam')
        {
            #<---=== Get Exam details ===----->
            $get = Exam::where('id',$request->id)->get();
            #<---=== Update Exam Status value 0 ===----->
            if($request->status == '1'){  
                    $data = Exam:: where('id',$request->id)->update([
                    'status' => '0',
                ]);
                return response()->json(['who'=>$request->who]);
            }else{
                #<---=== Update Exam Status value 1 ===----->  
                $data = Exam:: where('id',$request->id)->update([
                    'status' => '1',
                ]);
                return response()->json(['who'=>$request->who]);
            }
        }else{
            #<---=== Get Controller email where id is come from request ===----->
            $get= Controller::where('cid',$request->id)->get('email');
            #<---=== Send Warning Mail the getting email===----->
            Mail::to($get)->send(new Warnings($details));
        
            #<---=== Update Controller Status value 0 ===----->
            if($request->status == '1'){  
                    $data = Controller:: where('cid',$request->id)->update([
                        'status' => '0',
                    ]);
                    return response()->json(['who'=>$request->who]); 

            }else{
                #<---=== Update Controller Status value 1 ===----->  
                $data = Controller:: where('cid',$request->id)->update([
                    'status' => '1',
                ]);
                return response()->json(['who'=>$request->who]);
            }
        }
    }
    #<---=== Route For Teacher Delete ===----->
    public function teacher_delete($id)
    {
        if(!Session::get('admin_session')){
            return view('404');
            die();
        }else{
            $category = Teacher::findOrFail($id);
            $category->delete();
            return response()->json(['success'=>'Delete rtecord Successfully']);
        }

    }
    #<---=== Route For Controller Delete ===----->
    public function controller_delete($id)
    {
        if(!Session::get('admin_session')){
            return view('404');
            die();
        }else{
            $category = Controller::findOrFail($id);
            $category->delete();
            return response()->json(['success'=>'Delete rtecord Successfully']);
        }

    }
    #<---=== Route For Student Delete ===----->
    public function student_delete($id)
    {
        if(!Session::get('admin_session')){
            return view('404');
            die();
        }else{
            $category = Student::findOrFail($id);
            $category->delete();
            return response()->json(['success'=>'Delete rtecord Successfully']);
        }

    }
    #<---=== Route For Admin Logout ===----->
    public function admin_logout(Request $request)
    {
        $request->session()->forget('amain_session');
        $request->session()->forget('admin_session');
        return redirect(url('/'));
    }













    #<---===Route For Show Techer Dashboard===----->
    public function teacher_dashboard()
    {
        #<---===Check Teacher Loged in or not===----->
        if(!Session::get('teacher_session'))
        {
            return view('404');
            die();
        }
        else{
            #<---===Get Teacher details who is login===----->
            $get = Teacher::where('tid',Session::get('teacher_session'))->get();
            #<---===Pass Getting data inside below view===----->
            return view('teacher.dashboard',compact('get'));
        }
 
    }
    #<---=== Teacher Exam Part ===----->
    public function teacher_exam()
    {
        #<---===Check Teacher Loged in or not===----->
        if(!Session::get('teacher_session')){
            return view('404');
            die();
        }else{
            #<---===Get Some Exam details whose teacher is login===----->
            $exams = Exam::where('tid',Session::get('teacher_session'))->get();
            #<---===Pass Getting Exam value inside below view===----->
            return view('teacher.exam',compact('exams'));
        }
    }
    #<---=== Teacher Add Exam ===----->
    public function add_exam(Request $request)
    {
        #<---======Check Alredy bellow all Data Avilable Or Not=======----->
        $fac = Exam::where('faculty', $request->exam_fac)     ->value('faculty');
        $ses = Exam::where('semister',$request->exam_semister)->value('semister');
        $sem = Exam::where('session',$request->exam_session)  ->value('session');
        $co  =  Exam::where('course',$request->exam_course)   ->value('course');
        $typ = Exam::where('exam_type',$request->exam_type)   ->value('exam_type');
        $dat = Exam::where('exam_date',$request->exam_date)   ->value('exam_date');

        #<---======If Avilable=======----->
        if($fac && $ses && $sem && $co && $typ && $dat){
            return response()->json(['error'=>'A Exam Already Pending This Information']);
        }else{  

            #<---=== Insert Request Data Into Database ===----->
            $exam = new Exam();
            $exam->tid = Session::get('teacher_session');
            $exam->faculty = $request->exam_fac;
            $exam->semister = $request->exam_semister;
            $exam->session = $request->exam_session;
            $exam->course = $request->exam_course;
            $exam->course_id = $request->exam_course_id;
            $exam->exam_date = date('d/m/Y ', strtotime($request->exam_date));
            $exam->exam_time =  date('h:i A ', strtotime($request->exam_time));
            $exam->exam_type = $request->exam_type;
            $exam->exam_mark = $request->exam_mark;
            $exam->exam_duration = $request->exam_du ;
            $exam->accept = '0';
            $exam->status = '0';
            $exam->save();

            #<---=== pass success response ===----->
            return response()->json(['success'=>'Exam Informatio Added']);
        }

    }
    #<---=== Teacher Edit Exam ===----->
    public function edit_exam($id)
    {
        #<---=== Get Exam data by parameter $id ===----->
        $data = Exam::where('id',$id)->get();
        $date = $data[0]->exam_date;
        return response()->json(['data'=>$data, 'date'=>$date]);

    }
    #<---=== Teacher Edit Exam Update===----->
    public function edit_exam_update(Request $request)
    {
        #<---=== Update Exam Information===----->
        $data = Exam:: where('id',$request->edit_exam_id)->update([
            'faculty' => $request->edit_exam_fac,
           'session' => $request->edit_exam_session,
           'semister' => $request->edit_exam_semister,
           'course' => $request->edit_exam_course,
           'course_id' => $request->edit_exam_course_id,
           'exam_date' => $request->edit_exam_date,
           'exam_time' => $request->edit_exam_time,
           'exam_type' => $request->edit_exam_type,
           'exam_mark' => $request->edit_exam_mark,
           'exam_duration' => $request->edit_exam_du,
       ]);
       #<---===Pass the work success message===----->
       return response()->json(['success'=>'Update record Successfully']);
    }
    #<---=== Teacher Exam Delete ===----->
    public function examdeletes($id)
    {
        #<---=== Find the Exam using parameter $id and delete===----->
        $exam = Exam::findOrFail($id);
        $exam->delete();
        #<---=== Find the Question using Exam $id and delete===----->
        $question = Question::where('exam_id',$id)->delete();
        $exam->delete();
        return response()->json(['success'=>'Delete rtecord Successfully']);
    }
    #<---=== Teacher Exam Question ===----->
    public function exam_question(Request $request)
    {
        #<---======Check Alredy Exm Avilable Or Not=======----->
        $date = Question::where('exam_id',$request->exam_id)->where('question',$request->question)->value('exam_id');
        if($date){
            return response()->json(['error'=>'This Question Already Exists']);
        }else{  

            #<---=== Insert Request Data Into Database ===----->
            $question = new Question();
            $question->exam_id = $request->exam_id;
            $question->question = $request->question;
            $question->option1 = $request->question_option1;
            $question->option2 = $request->question_option2;
            $question->option3 = $request->question_option3;
            $question->option4 = $request->question_option4;
            $question->ans = $request->question_right_option;
            $question->save();

            return response()->json(['success'=>'Exam Question Added']);
        }

    }
    #<---=== Teacher Exam Status Manage ===----->
    public function exam_status(Request $request)
    {
            #<---=== first get question according to exam ===----->
            $check = Question::where('exam_id',$request->id)->value('exam_id');
            #<---=== If question exist ===----->
            if($check)
            {
                #<---=== Update Exam Status ===----->
                if($request->status == '0'){  
                    $data = Exam:: where('id',$request->id)->update([
                        'status' => '1',
                    ]);
                    return response()->json(['who'=>$request->who]);
                }else{
                    #<---=== Update Exam Status ===----->
                    $data = Exam:: where('id',$request->id)->update([
                        'status' => '0',
                    ]);
                    return response()->json(['who'=>$request->who]);

                }

            }
            #<---=== If question not exist ===----->
            else{
                #<---=== Update Exam Status ===----->
                if($request->status == '0'){
                    return response()->json(['error'=>'Inserrt Question First']);
                }else{
                    #<---=== Update Question Status ===----->
                    $data = Exam:: where('id',$request->id)->update([
                        'status' => '0',
                    ]);
                    return response()->json(['who'=>$request->who]);

                }
            }
    }
    #<---===  Teacher View Question View===----->
    public function view_queston($id)
    {
        #<---=== check Teacher Login or not ===----->
        if(!Session::get('teacher_session')){
            return view('404');
            die();
        }else{
            #<---=== Find Question using by examId ===----->
            $questions = Question::where('exam_id',$id)->get();
            #<---=== Pass Question And Exam Id ===----->
            return view('teacher.view_question',compact('questions','id'));
        }
    }
    #<---=== Show Question Details ===----->
    public function questions_details($id)
    {
        #<---=== check Teacher Login or not ===----->
        if(!Session::get('teacher_session')){
            return view('404');
            die();
        }else{
            #<---=== Find Question using by examId ===----->
            $data = Question::where('exam_id',$id)->get();
            return response()->json($data);
        }
    }    
    #<---===  Fetch Question details for edit question modal view ===----->
    public function question_edit($id)
    {
        $data = Question::where('id',$id)->get();
        return response()->json(['data'=>$data]);
    }
    #<---===  Update Question function===----->
    public function question_update(Request $request)
    { 
        #<---======Check Alredy Exm Avilable Or Not=======----->
        //$data = Question::where('question',$request->question)->value('exam_id');
        //if($data){
            //return response()->json(['error'=>'This Question Already Exists']);
        //}else{
        #<---===  Update Question ===----->
        $data = Question::findOrFail($request->question_id)->update([
            'question'=>$request->question,
            'option1'=>$request->question_option1,
            'option2'=>$request->question_option2,
            'option3'=>$request->question_option3,
            'option4'=>$request->question_option4,
            'ans'=>$request->question_right_option,
        ]);
        return response()->json(['success'=>'Question Updated']);
        //}
    }
    #<---===Question Delete  function===----->
    public function questions_deletes($id)
    {
        #<---=== Find Question Id,then delete,finally pass success message===----->
        $category = Question::findOrFail($id);
        $category->delete();
        return response()->json(['success'=>'Delete rtecord Successfully']);
    }
    //<!------===== All Question Delete  function======--------->
    public function deleteAll(Request $request)
    {
      $ids = $request->ids;
      
      foreach($ids as $id){//<!------=========Delete All Comming data one by one========--------->
        Question::where('id',$id)->delete();
      }
      return response()->json(['success'=>'Delete All Record Successfully']); 
    }
    #<---=== Teacher Logout ===----->
    public function teacher_logout(Request $request)
    {
        #<---=== Remove Session Data To logout ===----->
        $request->session()->forget('teacher_session');
        return redirect(url('/'));
    }












    #<---=== Student Dashboard ===----->
    public function student_dashboard()
    {
        #<---=== Check Sudent Login or not ===----->
        if(!Session::get('student_session')){
            return view('404');
            die();
        }else{
            #<---=== Get Login Student data and pass in view ===----->
            $get = Student::where('sid',Session::get('student_session'))->get();
            return view('student.dashboard',compact('get'));
        }
    }
    #<---=== Show Student Exam Information===----->
    public function student_exam()
    {
        #<---=== Check Student Login Or not ===----->
        if(!Session::get('student_session')){
            return view('404');
            die();
        }else{
            #<---=== Get Some Data using Login Session data and pass===----->
            $data1 = Student::where('sid',Session::get('student_session'))->value('session');
            $data2 = Student::where('sid',Session::get('student_session'))->value('semister');
            $data3 = Student::where('sid',Session::get('student_session'))->value('faculty');
    
            $datas = Exam::where('session',$data1)->where('semister',$data2)->where('faculty',$data3)->get();
            return view('student.exam',compact('datas'));
        }
        
    }
    #<---=== Student Join Exam ===----->
    public function join_exam($id)
    {
        #<---=== Check Student Login Or not ===----->
        if(!Session::get('student_session')){
            return view('404');
            die();
        }else{
            #<---=== Get All Question Details and some Exam information using exam_id===----->
            $data = Question::select(['questions.*','exams.course','exams.course_id','exams.exam_mark','exams.exam_duration','exams.exam_time'])->join('exams','questions.exam_id','=','exams.id')->where('questions.exam_id',$id)->get();
           
           return view('student.join_exam',compact('data'));
        }
    }
    #<---=== Student Submit Exam Question===----->
    public function submit_question(Request $request)
    {
        #<---===Check Student Already Attend this exam or not===----->
        $check = Result::where('user_id',Session::get('student_session'))->where('exam_id', $request->exam_id)->value('exam_id');
        #<---=== If Attend ===----->
        if($check){
            return back()->with('error','You All Ready Attend This Exam');
        }else{
            #<---===Check Exam Is Running Or Stop. Because some reason teacher change Exam status inactive.Then Student Canot Submit his exam ans ===----->
            $check = Exam::where('id', $request->exam_id)->value('status');
            #<---===If Exam is Running..That means in this case Exam Status Is Activ===----->
            if($check == 1){
                $data = $request->all();
                $yes_ans = 0;
                $no_ans = 0;
                $result = array();

                #<---===This loop is running untill request index or equal.This index value is the number of questuion===----->
                for($i=1;$i<= $request->index;$i++)
                {
                   if(isset($data['question'.$i]))
                   {
                     #<---===Get Question data Using question id===----->
                     $question = Question::where('id',$data['question'.$i])->get();
                     #<---=== If Student given Ans and real question Ans is match then===----->
                     if($question[0]->ans==$data['ans'.$i])
                     {
                        $result[$data['question'.$i]] = 'YES';
                        $yes_ans++;
                     }
                     #<---=== If Student given Ans and real question Ans is not match then===----->
                     else{
                       $result[$data['question'.$i]] = 'NO';
                       $no_ans++;
                     }
                   }
                }
        
                $res = new Result();
                $res->exam_id = $request->exam_id;
                $res->user_id = Session::get('student_session');
                $res->yes_ans = $yes_ans;
                $res->no_ans = $no_ans;
                $res->save();

                #<---=== When The Exam Submitted then show student Result===----->
                return redirect(url('/student/show_result/'.$request->exam_id.'/'.$res->id));
            }
            #<---===If Exam is Stop.That means in this case any kind of reason Exam Status Is inactive.Such that.....suppose Exam time is expired===----->
            else{
                return back()->with('error','Exam Stop');
            }
        }
    }
    #<---=== Showt Single Exam Result ===----->
    public function show_result($exam,$id)
    {
        #<---=== Check Student Login Or not ===----->
        if(!Session::get('student_session')){
            return view('404');
            die();
        }else{
            #<---=== Get Exam details using parameter $exam ===----->
            $exam= Exam::where('id',$exam)->get();
            #<---=== Join Reult And Student Table by user_id and get data according to result id ===----->
            $info = Result::select(['results.yes_ans','results.no_ans','students.*'])->join('students','results.user_id','=','students.sid')->where('results.id',$id)->get();
            return view('student.show_result',compact('exam','info'));
        }
    }
    #<---=== Show All Result For Student ===----->
    public function student_result()
    {
        #<---=== Check Student Login Or not ===----->
        if(!Session::get('student_session')){
            return view('404');
            die();
        }else{
            #<---=== Join Reult And Exam Table by exam id and get data according to Session data ===----->
            $datas = Result::select(['results.*','exams.session','exams.semister','exams.exam_date','exams.exam_type','exams.course_id'])->join('exams','results.exam_id','=','exams.id')->where('results.user_id',Session::get('student_session'))->get();
            return view('student.result',compact('datas'));
        }
    }
    #<---=== Student Logout ===----->
    public function student_logout(Request $request)
    {
        #<---=== Remove Session Data to logout ===----->
        $request->session()->forget('student_session');
        return redirect(url('/'));
    }














    #<---=== Controller Dashboard ===----->
    public function controller_dashboard()
    {
        #<---=== Check Contoller Login or not===----->
        if(!Session::get('controller_session')){
            return view('404');
            die();
        }else{
            #<---=== Get login controller data===----->
            $get = Controller::where('cid',Session::get('controller_session'))->get();
            return view('controllers.dashboard',compact('get'));
        }
    }
    #<---=== Controller Student Manage ===----->
    public function controller_student()
    {
        #<---=== Check Contoller Login or not===----->
        if(!Session::get('controller_session')){
            return view('404');
            die();
        }else{
            #<---=== Get student Information where student verify his account===----->
            $students = Student::where('verify','1')->get(); 
            return view('controllers.student',compact('students'));
        }

    }
    #<---=== Controller Logout ===----->
    public function controller_logout(Request $request)
    {
        #<---=== Remove Session Data to logout===----->
        $request->session()->forget('controller_session');
        return redirect(url('/'));
    }











    #<---=== Route For Email Verify ===----->
    public function gmail_verify($who,$email,$vkey)
    {
        #<---=== Check who want to verify his account ===----->
       if($who == 'teacher')
       {
          #<---=== Get Database Stored vkey ===----->
          $get = Teacher::where('email',$email)->where('vkey',$vkey)->value('vkey');
          if($get)
          {
              #<---=== Update Information ===----->
              $data = Teacher::where('email',$email)->update([
                'vkey' => "",
                'verify' => "1",
             ]);
          }
       }
       #<---=== Check who want to verify his account ===----->
       else if($who == 'controller')
       {
            #<---=== Get Database Stored vkey ===----->
            $get = Controller::where('email',$email)->where('vkey',$vkey)->value('vkey');
            if($get)
            {
                #<---=== Update Information ===----->
                $data = Controller::where('email',$email)->update([
                'vkey' => "",
                'verify' => "1",
                ]);
            }
       }
       else{
        #<---=== Get Database Stored vkey ===----->
           $get = Student::where('email',$email)->where('vkey',$vkey)->value('vkey');
            if($get)
            {
                #<---=== Update Information ===----->
                $data = Student::where('email',$email)->update([
                'vkey' => "",
                'verify' => "1",
                ]);
            }

       }

       return redirect('/');
    }
    #<---=== Route For Reset Password Link ===----->
    public function resets_link(Request $request)
    {
        #<---===  Genarate 5 digit vkey ===----->
        $vkey = 'abcdefghijklmnopqrstuvwxwzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890$*@';
        $vkey = str_shuffle($vkey);
        $vkey = substr($vkey,0,5);
        $details = [
          'who' =>  $request->reset_who,
          'email' => $request->reset_email,
          'vkey' => $vkey
        ];

        #<---=== Check who want to reset password ===----->
        if($request->reset_who == 'admin')
        {
            #<---=== Get email who want to reset password ===----->
            $get = Admin::where('email',$request->reset_email)->value('email');
            
            #<---=== If email is exist on database ===----->
            if($get)
            {
             #<---=== Send Reset password link in avobe getting email ===----->
              Mail::to($request->reset_email)->send(new ResetLink($details)); 
              #<---=== Update Some Information ===-----> 
              Admin:: where('email',$request->reset_email)->update([
                'vkey' => $vkey,
                'verify' => 0,
              ]);
              return response()->json(['success'=>'A verrification link send your inbox ! Verify Your Email','who'=>$request->reset_who]);

            }
            #<---=== If email is not exist on database ===----->
            else{
                return response()->json(['error'=>'Enter Registered Email Address']);
            }
        }
        #<---=== Check who want to reset password ===----->
        else if($request->reset_who == 'controller')
        {
            #<---=== Get email who want to reset password ===----->
            $get = Controller::where('email',$request->reset_email)->value('email');
            if($get)
            {
              #<---=== Send Reset password link in avobe getting email ===----->
              Mail::to($request->reset_email)->send(new ResetLink($details)); 
              #<---=== Update Some Information ===----->   
              Controller::where('email',$request->reset_email)->update([
                'vkey' => $vkey,
                'verify' => 0,
              ]);
              return response()->json(['success'=>'A verrification link send your inbox ! Verify Your Email','who'=>$request->reset_who]);
            }
            #<---=== If email is not exist on database ===----->
            else{
                return response()->json(['error'=>'Enter Registered Email Address']);
            }  

        }
        #<---=== Check who want to reset password ===----->
        else if($request->reset_who == 'teacher')
        {
            #<---=== Get email who want to reset password ===----->
            $get = Teacher::where('email',$request->reset_email)->value('email');
            if($get)
            {
              #<---=== Send Reset password link in avobe getting email ===----->
              Mail::to($request->reset_email)->send(new ResetLink($details));
              #<---=== Update Some Information ===----->  
              Teacher::where('email',$request->reset_email)->update([
                 'vkey' => $vkey,
                 'verify' => 0,
             ]);
             return response()->json(['success'=>'A verrification link send your inbox ! Verify Your Email','who'=>$request->reset_who]);

            }
            #<---=== If email is not exist on database ===----->
            else{
                return response()->json(['error'=>'Enter Registered Email Address']);
            } 
        }else
        {
            #<---=== Get email who want to reset password ===----->
            $get = Student::where('email',$request->reset_email)->value('email');
            if($get)
            {
              #<---=== Send Reset password link in avobe getting email ===----->
              Mail::to($request->reset_email)->send(new ResetLink($details));
              #<---=== Update Some Information ===----->  
              Student::where('email',$request->reset_email)->update([
                 'vkey' => $vkey,
                 'verify' => 0,
             ]);
             return response()->json(['success'=>'A verrification link send your inbox ! Verify Your Email','who'=>$request->reset_who]);

            }
            #<---=== If email is not exist on database ===----->
            else{
                return response()->json(['error'=>'Enter Registered Email Address']);
            }
        }
    }
    #<---=== Show Reset Password Form ===----->
    public function reset_password($who,$email,$vkey)
    {
        #<---=== Check who Open reset password form===----->
        if($who == 'teacher')
        {
            #<---=== Get vkey who want to reset password ===----->
           $get = Teacher::where('email',$email)->where('vkey',$vkey)->value('vkey');
           if($get)
           {
               #<---=== Update Some Information ===-----> 
               $data = Teacher::where('email',$email)->update([
                 'vkey' => "",
                 'verify' => "1",
              ]);
           }
           return view('emails.reset_password_form',compact('who','email'));
        }
        else if($who == 'controller')
        {
            #<---=== Get vkey who want to reset password ===----->
           $get = Controller::where('email',$email)->where('vkey',$vkey)->value('vkey');
           if($get)
           {
               #<---=== Update Some Information ===-----> 
               $data = Controller::where('email',$email)->update([
                 'vkey' => "",
                 'verify' => "1",
              ]);
           }
           return view('emails.reset_password_form',compact('who','email'));
        }
    }
    #<---=== Reset Password Update ===----->
    public function reset_password_confirm(Request $request)
    {
        #<---=== Check who send request reset password form===----->
        if($request->who == 'teacher')
        {
            #<---=== Get vkey who want to reset password ===----->
           $get = Teacher::where('email',$request->email)->value('vkey');
           if(!$get)
           {
            $ok = Teacher::where('email',$request->email)->update([
                 'password' => $request->pass,
            ]);
            return response()->json(['success'=>'Now You Can Login Your Account']);
           }
        }
        #<---=== Check who send request reset password form===----->
        else if($request->who == 'controller')
        {
            #<---=== Get vkey who want to reset password ===----->
           $get = Controller::where('email',$request->email)->value('vkey');
           if(!$get)
           {
            $ok = Controller::where('email',$request->email)->update([
                 'password' => $request->pass,
            ]);
            return response()->json(['success'=>'Now You Can Login Your Account']);
           }
        }
    }



        #<---=== Controller Student Manage ===----->
        public function genarate($exam,$id)
        {
            #<---=== Get Exam details using parameter $exam ===----->
            $exam= Exam::where('id',$exam)->get();
            #<---=== Join Reult And Student Table by user_id and get data according to result id ===----->
            $info = Result::select(['results.yes_ans','results.no_ans','students.*'])->join('students','results.user_id','=','students.sid')->where('results.id',$id)->get();

            $pdf = PDF::loadView('student.show_result', compact('exam','info'));
            return $pdf->stream('invoice.pdf');


        }


    

}
