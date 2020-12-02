@extends('admin.default')
@section('title','Admin | Student')
@section('content')
<div class="content-wrapper">

  <section class="content">
    <div class="container">
     <div class="mt-5"></div>
     <div class="card">
      <div class="card-header text-center bg-dark">
       <strong class="text-danger h3">Students Details</strong>


      </div>
      <div class="card-body">
        <div class="error"></div>
        <div class="success"></div>
    <!------===========Teacher Details Start=============------->
       <table class="table table-bordered table-striped">
        <thead class="bg-dark">
         <tr class="text-center">
          <td>ID</td>
          <td>NAME</td>
          <td>EMAIL</td>
          <td>BIRTH</td>
          <td>PHONE</td>
          <td>STATUS</td>
          <td>SESSION</td>
          <td>FACLTY</td>
          <td colspan="2">ACTION</td>
         </tr>
        </thead>
        <tbody>
        <!------=========== Shosw All Teacher Details Start=============------->
         @foreach ($students as $key=> $student)
         <tr class="text-center">
          <td>{{$student->sid}}</td>
          <td>{{$student->name}}</td>
          <td>{{$student->email}}</td>
          <td>{{$student->birth}}</td>
          <td>{{$student->phone}}</td>
          <td>
           @if($student->status == '0')
             <strong>❌</strong>
           @else
           <strong>✔</strong>
           @endif
          </td>
          <td>{{$student->session}}</td>
          <td>{{$student->faculty}}</td>
          <td>
           <button class="btn btn-sm btn-danger" onclick="student_delete({{$student->id}})">Delete</button>
          </td>
         </tr>
         @endforeach
        <!------=========== Shosw All Teacher Details End=============------->
        </tbody>
       </table>
    <!------===========Teacher Details End=============--------->
      </div>
     </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script>
  function student_delete(id)
  {
    $.ajax({
     type:"GET",
     dataType:"json",
     url:"/admin/student/delete/"+id,
     success:function(data)
     {
      $('.succcess').show();
      $('.success').html("<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>Delete Data Successfully<strong></strong></div>");

      setTimeout(function(){
      $('#success').hide(500);
       $(location).attr('href', '/admin/student');
      },3000);
     }
   });
  }
</script>
@endpush