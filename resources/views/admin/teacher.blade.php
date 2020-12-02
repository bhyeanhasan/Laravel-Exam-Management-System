@extends('admin.default')
@section('title','Admin | Teacher')
@section('content')
<div class="content-wrapper">

  <section class="content">
    <div class="container">
     <div class="mt-5"></div>
     <div class="card">
      <div class="card-header text-center bg-dark">
       <strong class="text-danger h3">Teacher Details</strong>
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
          <td colspan="2">ACTION</td>
         </tr>
        </thead>
        <tbody>
        <!------=========== Shosw All Teacher Details Start=============------->
         @foreach ($teacher as $key=> $teacher)
         <tr class="text-center">
          <td>{{$teacher->tid}}</td>
          <td>{{$teacher->name}}</td>
          <td>{{$teacher->email}}</td>
          <td>{{$teacher->birth}}</td>
          <td>{{$teacher->phone}}</td>
          <td>
           @if($teacher->status == '0')
             <input type='checkbox' class='checkBoxClass status_check' data-who="teacher"  value="{{$teacher->tid}}"  data-status="{{$teacher->status}}" />
           @else
           <input type='checkbox' class='checkBoxClass status_check' data-who="teacher" value="{{$teacher->tid}}"  data-status="{{$teacher->status}}" checked/>
           @endif
          </td>
          <td>
           <button class="btn btn-sm btn-danger" onclick="teacher_delete({{$teacher->id}})">Delete</button>
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
  function teacher_delete(id)
  {
    $.ajax({
     type:"GET",
     dataType:"json",
     url:"/admin/teacher/delete/"+id,
     success:function(data)
     {
      $('.succcess').show();
      $('.success').html("<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>Delete Data Successfully<strong></strong></div>");

      setTimeout(function(){
      $('#tablemessage').hide(500);
       $(location).attr('href', '/admin/teacher');
      },3000);
     }
   });
  }
</script>
@endpush