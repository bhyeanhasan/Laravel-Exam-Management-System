<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title> @yield('title') </title>
  <!--===============Tell the browser to be responsive to screen width============-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============Font Awesome============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!--===============Ionicons============-->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'">
  <!--===============Tempusdominus Bbootstrap 4============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!--===============iCheck============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!--===============JQVMap============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
  <!--===============Theme style============-->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!--===============overlayScrollbars============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!--===============Daterange picker============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!--===============summernote============-->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
  <!--===============Google Font: Source Sans Pro============-->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


 <div class="container" style="min-height: 100vh; background-color:rgb(58, 2, 2);display:flex;align-items:center;justify-content:center;">
  
    <div class="card" style="width: 600px;">
      <div class="card-header text-center bg-dark">
      <strong class="h2">Reset Your Password,<span style="text-transform: capitalize;">{{$who}}</span></strong>
      </div>
      <div class="card-body">
          <strong><div class='alert bg-danger alert-dismissible fade show text-center' role='alert' style="display: none;" id="error"></div></strong>
          <strong><div class='alert bg-success alert-dismissible fade show text-center' style="display: none;" id="success" role='alert'></div></strong>
          <form>
          <input type="hidden" id="who" value="{{$who}}">
          <input type="hidden" id="email" value="{{$email}}">
             <div class="form-group mt-2">
                <label for="password"><strong>Password</strong></label>
                <input type="password" class="form-control" id="password"  placeholder="Enter Your Password" />
             </div>
             <div class="form-group mt-2">
                <label for="cpassword"><strong>Password</strong></label>
                <input type="password" class="form-control" id="cpassword"  placeholder="Enter Your Confirm Password" />
             </div>
             <button type="submit" class="mt-3 btn btn-dark form-control" id="reset_btn">Reset</button>
          </form>
      </div>
   </div>
 </div>



<!--===============jQuery============-->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!--===============jQuery UI 1.11.4============-->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!--===============Resolve conflict in jQuery UI tooltip with Bootstrap tooltip============-->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!--===============Bootstrap 4============-->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!--===============ChartJS============-->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<!--===============Sparkline============-->
<script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>
<!--===============JQVMap============-->
<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!--===============jQuery Knob Chart============-->
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!--===============daterangepicker============-->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!--===============Tempusdominus Bootstrap 4============-->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!--===============Summernote============-->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!--===============overlayScrollbars============-->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!--===============AdminLTE App============-->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!--===============AdminLTE dashboard demo (This is only for demo purposes)============-->
<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>
<!--===============AdminLTE for demo purposes============-->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>


<script>

//<!--====== SignUp ======-->
$("#reset_btn").click(function(e){
  e.preventDefault();
  //<!--====== Access SignUp  Form Data======-->
   let pass     =   $("#password").val();
   let cpass     =   $("#cpassword").val();
   let who     =   $("#who").val();
   let email   =   $("#email").val();
   let _token =   $('meta[name="csrf-token"]').attr('content');
   
   if(pass=="" ||cpass=="")
    {
    $("#error").show(100);
    $("#error").text('Please Fill All The Blanks');
    }
    else if(pass !== cpass)
    {
      $("#error").text('Confirm Password Is Not Match');
    }else{
        $.ajax({
          url: "/reset/password/confirm",
          type:"POST",
          data:{
            who:who,
            email:email,
            pass:pass,
            _token: _token
          },
          success:function(response){
            console.log(response);
            if(response.error)
            {
              $("#error").show(200);
              $("#error").text(response.error);
            }else{
            $("#error").hide(500);
      
            setTimeout(function(){
              $("#success").show(200);
              $("#success").text(response.success);
            },600);

      
              setTimeout(function(){
              $('#success').hide(500);
              $(location).attr('href', '/');

              },3000);
            }
          }
        });
    }
  });


</script>

</body>
</html>
















