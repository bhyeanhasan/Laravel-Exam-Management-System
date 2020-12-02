@extends('controllers.default')
@section('title','Controll | Student')
@section('content')
<div class="content-wrapper">

  <section class="content">
    <div class="container">
     <div class="mt-5"></div>
     <div class="card">
      <div class="card-header text-center bg-dark">
       <strong class="text-danger h3">Student Details</strong>
      </div>
      <div class="card-body">
        <div class="error"></div>
        <div class="success"></div>
    <!------===========Student Details Start=============------->
       <table class="table table-bordered table-striped">
        <thead class="bg-dark">
         <tr class="text-center">
          <td>ID</td>
          <td>NAME</td>
          <td>EMAIL</td>
          <td>BIRTH</td>
          <td>PHONE</td>
          <td>STATUS</td>
          <td colspan="2">ACTION</td>
         </tr>
        </thead>
        <tbody>
        <!------=========== Shosw All Student Details Start=============------->
         @foreach ($students as $key=> $student)
         <tr class="text-center">
          <td>{{$student->sid}}</td>
          <td>{{$student->name}}</td>
          <td>{{$student->email}}</td>
          <td>{{$student->birth}}</td>
          <td>{{$student->phone}}</td>
          <td>
           @if($student->status == '0')
             <input type='checkbox' class='checkBoxClass status_check' data-who="student"  value="{{$student->sid}}"  data-status="{{$student->status}}" />
           @else
           <input type='checkbox' class='checkBoxClass status_check' data-who="student" value="{{$student->sid}}"  data-status="{{$student->status}}" checked/>
           @endif
          </td>
          <td>
           <button class="btn btn-sm btn-info">View</button>
          </td>
         </tr>
         @endforeach
        <!------=========== Shosw All Student Details End=============------->
        </tbody>
       </table>
    <!------===========Student Details End=============--------->
      </div>
     </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
@endpush