@extends('admin.default')
@section('title','Admin | Dashboard')
@section('content')
<div class="content-wrapper">

  <section class="content">
    <div class="pt-4"></div>
    <div class="container">
      <div class="success"></div>
      <div class="row">
        <div class="col-sm-4 m-auto" style="height: 250px;">
          <!-----========To Show Profile Image And Chosing Image Start========----->
          <img id="previewimg" style="height: 250px; width:100%; border:none;outline:none;"src="{{asset('images/admin')}}/{{$get[0]->photo}}" alt="Insert Image" />
          <!-----========To Show Profile Image And Chosing Image End========----->
        </div>
      </div>
      <div class="row mt-1">
        <div class="col-sm-4 m-auto border">
          <!--=====To Show Return Back Response Message Start=====--> 
          @if(Session::has('error'))
          <div class="alert alert-primary" role="alert">
           {{Session::get('error')}}
           <!--=====To Show Return Back Response Message End=====--> 
         </div>
         @endif
         <!--=====Profile Image Insert Form Start=====-->         
          <form enctype="multipart/form-data" method="POST" action="/upload">
            @csrf <!--=====Add CSRF Token for post method=====-->
              <div class="row">
                <div class="col-sm-9 m-auto">
                  <div class="form-grop">
                    <input type="file" id="file" name="file" class="form-control bg-info" onchange="previewfile(this)" />
                    <!--===== Add onchange="previewfile(this)" To Show Imidiate Chosing Image=====--> 
                    <!--=====Add Two Hidden File =====--> 
                  <input type="hidden" name="who" value="admin">
                  <input type="hidden" name="name" value="{{$get[0]->id}}">
                  </div>
                </div>
                <div class="col-sm-3 m-auto">
                  <button class="btn btn-info" type="submit">Update</button>
                </div>
              </div>
          </form>
          <!--=====Profile Image Insert Form End=====--> 
        </div>
      </div><br>
      <div class="row">
        <div class="col-sm-9 m-auto">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birth</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($get as $gets)
              <tr>
              <td>{{$gets->name}}</td>
              <td>{{$gets->email}}</td>
              <td>{{$gets->phone}}</td>
              <td>{{$gets->birth}}</td>
              </tr>
              @endforeach
            </tbody>
            <div class="text-center">
              <p><strong class="text-danger">Main Session Variable : &nbsp;</strong>{{Session::get('amain_session')}}</p>
            </div>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection


@push('scripts')
<script>
  function previewfile(input)
  {
    var file = $("input[type=file]").get(0).files[0];
    if(file)
    {
      var reader = new FileReader();
      reader.onload = function()
      {
        $('#previewimg').attr("src", reader.result);
      }
      reader.readAsDataURL(file);
    }
  }
</script>
@endpush