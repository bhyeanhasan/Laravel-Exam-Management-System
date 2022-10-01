> ## Laravel Exam Management System


<br><br><br>


## 🌸Admin,Student,Controller,Teacher Login credential <br>
```
    user name : shishirbhuiyan83@gmail.com
    Id        : 1802043
    password  : password
```
<br><br>
<strong>1. Clone GitHub repo for run project locally</strong><br>
Make sure you have git installed locally on your computer first.<br>
<strong>2. cd into your project</strong><br>
You will need to be inside that project file to enter all of the rest of the commands.<br>
<strong>3. Install Composer Dependencies <span style="color: red;;">composer install</span> ,sometimes <span style="color: red;;">composer update</span></strong><br>
Whenever you clone a new Laravel project you must now install all of the project dependencies. This is what actually installs Laravel itself, among other necessary packages to get started.When we run composer, it checks the composer.json file which is submitted to the github repo and lists all of the composer (PHP) packages that your repo requires. Because these packages are constantly changing, the source code is generally not submitted to github, but instead we let composer handle these updates. So to install all this source code we run composer with the following command.<br>

<strong>4. Install NPM Dependencies <span style="color: red;">npm install</span></strong><br>
we must also install necessary NPM packages to move forward.This is installing the Javascript (or Node) packages required.The list of packages that a repo requires is listed in the packages.json file which is submitted to the github repo.we do not commit the source code for these packages to version control (github) and instead we let NPM handle it.<br>

<strong>5. Create a copy of your .env file <span style="color: red;">cp .env.example .env</span></strong><br>
            .env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project expects us to have. So we will make a copy of the .env.example file and create a .env file that we can start to fill out to do things like database configuration in the next few steps.This will create a copy of the .env.example file in your project and name the copy simply .env.<br>

<strong>6.Generate an app encryption key <span style="color: red;">php artisan key:generate</span></strong><br>
            Laravel requires you to have an app encryption key which is generally randomly generated and stored in your .env file. The app will use this encryption key to encode various elements of your application from cookies to password hashes and more.<br>
<strong>7. Create an empty database for our application</strong><br>
            Create an empty database for your project using the database tools you prefer.<br>

<strong>8. In the .env file, add database information to allow Laravel to connect to the database</strong><br>
            We will want to allow Laravel to connect to the database that you just created in the previous step. To do this, we must add the connection credentials in the .env file and Laravel will handle the connection from there.In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.<br>


<strong>9. Migrate the database <span style="color: red;">php artisan migrate</span></strong><br>
            Once your credentials are in the .env file, now you can migrate your database.It’s not a bad idea to check your database to make sure everything migrated the way you expected.<br>


<strong>10. [Optional]: Seed the database  <span style="color: red;">php artisan db:seed</span></strong><br>
            If your repository has a seeding file setup, then now is the time to run the seed, which fills your database with starter or dummy data. If the repo doesn’t mention the existence of a seeder file, then skip this step.After the migrations are complete and you have the database structure required, then you can seed the database (which means add dummy data to it).<br>

<strong>11. [Optional]: Import sql file if it is available</strong><br>


<strong>12. Run: <span style="color: red;">php artisan serve</span></strong><br>

<br><br>

> Admin can `delete,view` any `teacher or controller` account also `student`.If Admin Forgot his `password` he can `reset` his password again using his `Email` account.



> Controller `active,inactive` any `Student` account


> Teacher can create,delete,update,active,inactive his `Exam & Question`



> Student can `attend` his` Running` Exam & `See` his result ,also `download` his exam `Marksheet`

<br><br><br><br><br><br><br><br><br>

> <br><br>Thats All About My Simple Exam Management Project in 2020 on `LARAVEL`.......🤝✔😜🤝<br><br>
