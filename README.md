>## Laravel Exam Management System
<br><br><br><br>

>### Process
+ Start Your Local Server
+ First Download Fresh Laravel Project Using `composer create-project laravel/laravel blog` OR `composer create-project laravel/laravel sites/test --prefer-dist`
+ Open this code inside `VS code edittor`
+ Download this Project.Then `copy` and `paste` ,`inside Fresh laravel Project`
+ Run  &nbsp;&nbsp;:&nbsp;&nbsp;php artisan serve`
+ Run to create three mail functionality  &nbsp;&nbsp;:<br>
`php artisan make:mail VerifyMail`<br>
`php artisan make:mail ResetLink`<br>
`php artisan make:mail Warnings`<br>
make sure that to continue with mail functionality, you should off `Two Step Verification` && On `Less Secure App Access`.So you first login your account then go to `settings/security/scroll down` and you should find this two security system.
<br><br><br><br><br><br>


+ This Simple Project Have `Four` Controlling System
+ Such As: `Admin,Teacher,Controller,Student`
<br><br><br><br><br><br>



+ Make Cnfiguration to connect databaase using `.env` also configured email details
```php
#<--=====For Conect Database======---->
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= Dtabase Name Here
DB_USERNAME=root
DB_PASSWORD=

#<--=====For Sending Mail======---->
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=shishirbhuiyan83@gmail.com
MAIL_PASSWORD= Your Mail Password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=shishirbhuiyan83@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```
<br><br><br><br><br><br>





+ Create a controller as your wish `php artisan make:controller AuthController`
+ Create `7` Migrations `&` Modal
  + Run  &nbsp;&nbsp;:&nbsp;&nbsp; `php artisan make:model Admin -m`
   ```php
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('aid')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('login_date')->nullable();
            $table->string('login_time')->nullable();
            $table->timestamps();
        });
    }
   ```
  + Run  &nbsp;&nbsp;:&nbsp;&nbsp;  `php artisan make:model Teacher -m`
  ```php
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('tid')->nullable();
            $table->string('faculty')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->nullable();
            $table->string('vkey')->nullable();
            $table->string('verify')->nullable();
            $table->timestamps();
        });
    }
  ```
  + Run  &nbsp;&nbsp;:&nbsp;&nbsp;  `php artisan make:model Controller -m`   
  ```php
    public function up()
    {
        Schema::create('controllers', function (Blueprint $table) {
            $table->id();
            $table->string('cid')->nullable();
            $table->string('faculty')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->nullable();
            $table->string('vkey')->nullable();
            $table->string('verify')->nullable();
            $table->timestamps();
        });
    }
  ```
  + Run  &nbsp;&nbsp;:&nbsp;&nbsp;  `php artisan make:model Student -m`   
  ```php
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('sid')->nullable();
            $table->string('faculty')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('session')->nullable();
            $table->string('semister')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->nullable();
            $table->string('vkey')->nullable();
            $table->string('verify')->nullable();
            $table->timestamps();
        });
    }
  ```
  + Run  &nbsp;&nbsp;:&nbsp;&nbsp;  `php artisan make:model Exam -m`   
  ```php
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('tid')->nulable();
            $table->string('faculty')->nulable();
            $table->string('session')->nulable();
            $table->string('semister')->nulable();
            $table->string('course')->nulable();
            $table->string('course_id')->nulable();
            $table->string('exam_date')->nulable();
            $table->string('exam_time')->nulable();
            $table->string('exam_type')->nulable();
            $table->string('exam_mark')->nulable();
            $table->string('exam_duration')->nulable();
            $table->string('accept')->nulable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
  ```
  + Run  &nbsp;&nbsp;:&nbsp;&nbsp;  `php artisan make:model Question -m`   
  ```php
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id')->nullable();
            $table->string('question')->nullable();
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
            $table->string('ans')->nullable();
            $table->timestamps();
        });
    }
  ```
  + Run  &nbsp;&nbsp;:&nbsp;&nbsp;  `php artisan make:model Result -m` 
  ```php
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('exam_id');
            $table->string('user_id');
            $table->string('yes_ans');
            $table->string('no_ans');
            $table->timestamps();
        });
    }

  ```
  <br><br><br><br><br><br>


+ Create Some `Fillable` instructions inside every `model`<br>
You Find All `Models` inside `App\Http\Models`. Here i show you One Proces For `Student Model`
```php
class Student extends Model
{
    use HasFactory;
    protected $table = "students"; //Table Name
    protected $primaryKey = "id";
    protected $fillable = ['sid','name','email','birth','phone','pasword','status','vkey','verify','photo','faculty','session','semister']; //Table Column Name
}
```
 <br><br><br><br><br><br>



+ Run  &nbsp;&nbsp;:&nbsp;&nbsp; `php artisan migrate`<br>
This Command Create `7` `tables` inside database.
<br><br><br><br><br><br>




+ First Manualy insert `Admin` data in the `phpMyAdmin`
+ Second SignUp As a `Controller` to controll `status` , `Student` & `Teacher`.When You signup a verification link send to your Email Account.Becuse You should confirm that this email address is valid for you.
+ Then Finished All `Registration And Login`, As wel as `Controller`
<br><br><br><br><br><br>











> Admin can `delete,view` any `teacher or controller` account also `student`.If Admin Forgot his `password` he can `reset` his password again using his `Email` account.

<br><br><br>



> Controller `active,inactive` any `Student` account 

<br><br><br>



> Teacher can create,delete,update,active,inactive his `Exam & Question`

<br><br><br>



> Student can  `attend` his` Running` Exam & `See`  his result ,also `download` his exam `Marksheet`



<br><br><br><br><br><br><br><br><br>



><br><br><br>Thats All About My Simple Exam Management Project in 2020 on `LARAVEL`.......🤝✔✔✔✔🤝<br><br><br>




