@extends('admin.default')
@section('title','Admin | Controller')
@section('content')
<div class="content-wrapper">

  <section class="content">
    <div class="container">
     <div class="mt-5"></div>
      <!------===========Teacher Card Start=============------->
     <div class="card">
      <!------===========Teacher Card Header Start=============------->
      <div class="card-header text-center bg-dark">
       <strong class="text-danger h3">Controller Details</strong>
      </div>
      <!------===========Teacher Card Header End=============------->
      <!------===========Teacher Card Body Start=============------->
      <div class="card-body">
        <!------=========== Message Start=============------->
        <div class="error"></div>
        <div class="success"></div>
        <!------=========== Message End=============------->
       <!------===========Teacher Details  Table Start=============------->
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
         @foreach ($controllers as $key=> $controller)
         <tr class="text-center">
          <td>{{$controller->cid}}</td>
          <td>{{$controller->name}}</td>
          <td>{{$controller->email}}</td>
          <td>{{$controller->birth}}</td>
          <td>{{$controller->phone}}</td>
          <td>
            
           @if($controller->status == '0')
             <input type='checkbox' class='checkBoxClass status_check' data-who="controller"  value="{{$controller->cid}}"  data-status="{{$controller->status}}" />
           @else
           <input type='checkbox' class='checkBoxClass status_check' data-who="controller" value="{{$controller->cid}}"  data-status="{{$controller->status}}" checked/>
           @endif
          </td>
          <td>
           <button class="btn btn-sm btn-danger" onclick="controller_delete({{$controller->id}})">Delete</button>
          </td>
         </tr>
         @endforeach
        <!------=========== Shosw All Teacher  End=============------->
        </tbody>
       </table>
      <!------===========Teacher Details  Table End=============--------->
      </div>
      <!------===========Teacher Card Body End=============------->
     </div>
    </div>
  </section>
</div>
@endsection

@push('scripts')
<script>
  //<------=========== Delete Controller Start=============------->
  function controller_delete(id)
  {
    $.ajax({
     //<------=========== Which type of Request you want to send=============------->
     type:"GET",
     //<------=========== Which type of data you want to get=============------->
     dataType:"json",
     //<------=========== Which url You Want To Send Request=============------->
     url:"/admin/controller/delete/"+id,
     //<------=========== If Request Send Successfully Then=============------->
     success:function(data)
     {
      $('.succcess').show();
      $('.success').html("<div class='alert alert-success alert-dismissible fade show text-center' role='alert'>Delete Data Successfully<strong></strong></div>");

      setTimeout(function(){
      $('#success').hide(500);
       $(location).attr('href', '/admin/controller');
      },3000);
     }
   });
  }
  //<------=========== Delete Controller End=============------->
</script>
@endpush