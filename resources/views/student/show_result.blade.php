@extends('student.default')
@section('title',' Student | Result')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
   <div class="mt-2"></div>
    <div class="container">
     <div class="row">
      <div class="col-sm-10 m-auto">
       <div class="card">
        <div class="card-header text-center" style="background-color: #005e83;">
          <div class="row">
           <div class="col-sm-11 text-center">
            <strong class="h2 text-center" style="font-weight:bold; color:black;">Mark Sheets</strong>
           </div>
           <div class="col-sm-1 text-right">
           <a href="{{url('/markshet/download/'.Request::segment(3).'/'.Request::segment(4))}}" class="btn btn-sm btn-dark ">Print</a>
           </div>
          </div>
        </div>
        <div class="card-body" style="background-color: #1b0213;">
         <table class="table table-striped">
          <thead style="background-color: #ffa400;">
           <tr class="text-center">
            <th>Name</th>
            <th>Email</th>
            <th>Session</th>
            <th>Semister</th>
            <th>Exam Date</th>
            <th>Course</th>
            <th>Exam Type</th>
           </tr>
          </thead>
          <tbody>
           <tr class="text-center text-light">
            <td>{{ $info[0]->name }}</td>
            <td>{{ $info[0]->email }}</td>
            <td>{{ $info[0]->session }}</td>
            <td>{{ $info[0]->semister }}</td>
            <td>{{ $exam[0]->exam_date}}</td>
            <td>{{ $exam[0]->course}}</td>
            <td>{{ $exam[0]->exam_type}}</td>
           </tr>
          </tbody>
         </table>
        </div>
       </div>
       <div class="card">
        <div class="card-body" style="background-color: #1b0213;">
          <table class="table table-bordered table-striped">
           <thead>
            <tr class="text-center" style="background-color: #ffa400;">
              <th>Total</th>
             <th>Correct</th>
             <th>Incorrect</th>
            </tr>
           </thead>
           <tbody>
            <tr class="text-center text-light">
             <td>{{ $info[0]->yes_ans + $info[0]->no_ans }}</td>
             <td>{{ $info[0]->yes_ans }}</td>
             <td>{{ $info[0]->no_ans }}</td>
            </tr>
           </tbody>
          </table>
        </div>
       </div>
      </div>
     </div>
    </div>
  </div>
</div>
@endsection

