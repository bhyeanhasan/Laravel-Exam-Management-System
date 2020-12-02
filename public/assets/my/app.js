$("document").ready(function(){
$(".second_row").hide();
 $(".card_signup").hide();
 $(".card_reset").hide();
 $("#sup_error").hide();
 $("#sup_success").hide();
 $("#sin_error").hide();
 $("#sin_success").hide();
 $("#reset_error").hide();
 $("#reset_success").hide();

 $("#signup_link").click(function(){
  $(".card_signin").hide();
  $(".card_reset").hide();
  $(".card_signup").show();
 }); 
 
 $(".signin_link").click(function(){
  $(".card_signin").show();
  $(".card_signup").hide();
  $(".card_reset").hide();
 });

  
 $("#reset_link").click(function(){
  $(".card_signin").hide();
  $(".card_signup").hide();
  $(".card_reset").show();
 });


$("#sup_who").change(function(){
  
  if($("#sup_who").val() == 'student')
  {
    $(".second_row").show(50);
  }else{
    $(".second_row").hide();
  }
});




 //<!--====== SignUp ======-->
 $("#signup_btn").click(function(e){
   e.preventDefault();

 //<!--====== Access SignUp  Form Data======-->
   let sup_who     =   $("#sup_who").val();
   let sup_id      =   $("#sup_id").val();
   let sup_name    =   $("#sup_name").val();
   let sup_email   =   $("#sup_email").val();
   let sup_birth   =   $("#sup_birth").val();
   let sup_phone   =   $("#sup_phone").val();
   let sup_fac   =   $("#sup_fac").val();
   let sup_pass    =   $("#sup_pass").val();
   let sup_cpass   =   $("#sup_cpass").val();
   let sup_session    =   $("#sup_session").val();
   let sup_semister   =   $("#sup_semister").val();
   let _token =   $('meta[name="csrf-token"]').attr('content');


   


   if(sup_id=="" ||sup_name=="" ||sup_email=="" ||sup_birth=="" ||sup_phone=="" ||sup_pass=="" ||sup_cpass=="")
   {
    $("#sup_error").show(100);
    $("#sup_error").text('Please Fill All The Blanks');
   }else if(sup_who == '0')
    {
     $("#sup_error").text('Select Who Are You');
    }else if(sup_fac=="0")
    {
      $("#sup_error").text('Select Your Related Faculty');
    }
    else if(sup_pass !== sup_cpass)
    {
     $("#sup_error").text('Confirm Password Is Not Match');
    }else{
      $("#before").show();
       setTimeout(() => {
        $.ajax({
          url: "/user/signup",
          type:"POST",
          data:{
            sup_who:sup_who,
            sup_fac:sup_fac,
            sup_id:sup_id,
            sup_name:sup_name,
            sup_email:sup_email,
            sup_birth:sup_birth,
            sup_phone:sup_phone,
            sup_pass:sup_pass,
            sup_session:sup_session,
            sup_semister:sup_semister,
            _token: _token
          },
          success:function(response){
           console.log(response);
            if(response.error)
            {
              $("#before").hide();
             $("#sup_error").show(200);
             $("#sup_error").text(response.error);
            }else{
            $("#before").hide();
            $("#signup_form").trigger('reset');
            $("#sup_error").hide(500);
      
            setTimeout(function(){
             $("#sup_success").show(200);
             $("#sup_success").text(response.success);
            },600);

      
            setTimeout(function(){
              $('#sup_success').hide(500);
              $(".btn-close").click();
            },10000);
            }
          }
     });
       }, 7000);
    }
   });




//<!--====== SignIn ======-->
  $("#signin_btn").click(function(e){
    e.preventDefault();
    let sin_who     =   $("#sin_who").val(); //<!--====== Access SignIn  Form Data======-->
    let sin_id      =   $("#sin_id").val();
    let sin_email   =   $("#sin_email").val();
    let sin_pass    =   $("#sin_pass").val();
    let _token      =   $('meta[name="csrf-token"]').attr('content');

    if(sin_who=="" ||sin_id==""||sin_email==""||sin_pass=="")
    {
     $("#sin_error").show(100);
     $("#sin_error").text('Please Fill All The Blanks');
    }else if(sin_who == "0")
     {
      $("#sin_error").text('Select Who Are You');
     }else{
        $.ajax({
          url: "/user/signin",
          type:"POST",
          data:{
            sin_who:sin_who,
            sin_id:sin_id,
            sin_email:sin_email,
            sin_pass:sin_pass,
            _token: _token
          },
          success:function(response){
          console.log(response);
            if(response.error)
            {
            $("#sin_error").show(200);
            $("#sin_error").text(response.error);
            }else{
            $("#signin_form").trigger('reset');
            $("#sin_error").hide(500);
      
            setTimeout(function(){
            $("#sin_success").show(200);
            $("#sin_success").text(response.success);
            },600);

      
              setTimeout(function(){
              $('#sin_success').hide(500);
              $(".btn-close").click();
              if(response.who == 'admin')
              {
              $(location).attr('href', '/admin/dashboard');
              }
              else if(response.who == 'controller')
              {
              $(location).attr('href', '/controller/dashboard');
              }
              else if(response.who == 'teacher')
              {
              $(location).attr('href', '/teacher/dashboard');
              }else{
                $(location).attr('href', '/student/dashboard');
              }

              },3000);
            }
          }
        });
     }
  });





    //<!--====== Status Management ======-->
    $(document).on('click','.status_check',function(){
      var ids = $(this).val();
      var who = $(this).attr('data-who');
      var status = $(this).attr('data-status');
      let _token   = $('meta[name="csrf-token"]').attr('content');

         $.ajax({
          url: "/admin/status",
          type:"POST",
          data:{
            id:ids,
            who:who,
            status:status,
            _token: _token
          },
          success:function(res){
            console.log(res);
            console.log(res.who);
            console.log(res.check);
            $('.success').show();
            $('.success').html("<div class='alert alert-success alert-dismissible fade show text-center' role='alert'><strong>Status Updated Successfully</strong></div>");

            setTimeout(function(){
            $('.success').hide(500);
            if(res.who == 'student'){
              $(location).attr('href', '/controller/student');
            }else if(res.who == 'controller'){
              $(location).attr('href', '/admin/controller');
            }else{
              $(location).attr('href', '/admin/teacher');
            }
           
            },3000);
          }

        });
      });
    


      
    //<!--====== Send Reset Pasword Link ======-->
      $("#send_reset_link_btn").click(function(e){
        e.preventDefault();
        let reset_who     =   $("#reset_who").val(); //<!--====== Access SignIn  Form Data======-->
        let reset_email   =   $("#reset_email").val();
        let _token      =   $('meta[name="csrf-token"]').attr('content');

       if(reset_email=="")
        {
        $("#reset_error").show(100);
        $("#reset_error").text('Enter Your Email Address');
        }else if(reset_who == "0")
        {
          $("#reset_error").text('Select Who Are You');
        }else{
          $.ajax({
            url: "/reset/link",
            type:"POST",
            data:{
              reset_who:reset_who,
              reset_email:reset_email,
              _token: _token
            },
            success:function(response){
            console.log(response);
              if(response.error)
              {
              $("#reset_error").show(200);
              $("#reset_error").text(response.error);
              }else{
              $("#reset_error").hide(500);
        
              setTimeout(function(){
              $("#reset_success").show(200);
              $("#reset_success").text(response.success);
              },600);
              }
            }
          });
        }
      });



});








