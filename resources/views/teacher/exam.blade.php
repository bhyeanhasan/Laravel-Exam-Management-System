@extends('teacher.default')
@section('title','Teacher | Exam')
@section('content')
<div class="content-wrapper">

  <section class="content">
    <div class="container">
     <div class="mt-5"></div>
     <div class="card">
      <div class="card-header text-center bg-dark">
      <div class="row">
        <div class="col-sm-4 text-left">
        <a href="{{url('/teacher/dashboard')}}" class="btn btn-sm btn-light">Back</a>
        </div>
        <div class="col-sm-4 text-cener">
        <strong class="text-danger h3">Exam Details</strong>
        </div>
        <div class="col-sm-4 text-right">
          <button class="btn btn-sm btn-danger "data-toggle="modal" data-target="#exampleModalCenter"><i class='fas fa-plus'></i>&nbsp; Exam</button>
        </div>
      </div>
      </div>

      <div class="card-body">
        <div class="error"></div>
        <div class="success"></div>
    <!------===========Teacher Details Start=============------->
       <table class="table table-bordered table-striped">
        <thead class="bg-dark">
         <tr class="text-center">
          <td>Faculty</td>
          <td>Session</td>
          <td>Semister</td>
          <td>Course</td>
          <td>Type</td>
          <td>Date</td>
          <td>Time</td>
          <td>Mark</td>
          <td>Duration</td>
          <td>Status</td>
          <td>Accept</td>
          <td colspan="3">ACTION</td>
         </tr>
        </thead>
        <tbody>
        <!------=========== Shosw All Teacher Details Start=============------->
         @foreach ($exams as $key=> $exam)
         <tr class="text-center">
          <td>{{$exam->faculty}}</td>
          <td>{{$exam->session}}</td>
          <td>{{$exam->semister}}</td>
          <td>{{$exam->course}}</td>
          <td>{{$exam->exam_type}}</td>
          <td>{{date('d/m/Y', strtotime( $exam->exam_date))}}</td>
          <td>{{date('h:i A ', strtotime( $exam->exam_time))}}</td>
          <td>{{$exam->exam_mark}}</td>
          <td>{{$exam->exam_duration}}</td>
          <td>
           @if($exam->status == '0')
             <input type='checkbox' class='checkBoxClass status_check_exam' value="{{$exam->id}}"  data-status="{{$exam->status}}" data-start="{{$exam->exam_time}}"/>
           @else
           <input type='checkbox' class='checkBoxClass status_check_exam'  value="{{$exam->id}}"  data-status="{{$exam->status}}" data-start="{{$exam->exam_time}}" checked/>
           @endif
          </td>
          <td>
            @if($exam->accept == "0")
              <strong class="text-danger">.....</strong>
            @else
            <strong class="text-danger">✔</strong>
            @endif
          </td>
          <td>
           <button class="btn btn-sm btn-danger" onclick="examdeletes({{$exam->id}})"><i class='fas fa-trash'></i></button>
           <button class="btn btn-sm btn-warning"data-toggle="modal" data-target="#EditExamIbformation"onclick="edit_exam_details({{$exam->id}})"><i class='fas fa-edit'></i></button>
            <a href="{{url('/view_question/'.$exam->id)}}"class="btn btn-sm btn-info" ><i class='fas fa-eye'></i></a>
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
<!------===========Add Exam Information Modal Start=============--------->  
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-body">
         <div class="card modal_Exam">
             <div class="card-header text-center bg-info">
                 <span class="h3"> Add Examnation Details </span>
             </div>
             <div class="card-body">
              <img src="{{ asset('assets/images/loading1.gif ') }}" alt="" height="30px" width="100%" id="before">
             <strong><div  style="display: none;" class='alert bg-danger alert-dismissible fade show text-center' role='alert' id="exam_error"></div></strong>
             <strong><div  style="display: none;" class='alert bg-success alert-dismissible fade show text-center' id="exam_success" role='alert'></div></strong>
             <form id="exam_form">
              <input type="hidden"  id="exam_exam_id">
                <div class="row">
                     <div class="col-sm-4">
                         <div class="form-group mt-2">
                           <label for="exam_fac"><strong style="color:black;">Faculty </strong></label>
                           <select id="exam_fac" class="form-control">
                              <option value="0">-- Select --</option>
                              <option value="CSE">CSE</option>
                              <option value="EEE">EEE</option>
                              <option value="AG">AG</option>
                           </select>
                         </div>
                     </div>
                     <div class="col-sm-4">
                         <div class="form-group mt-2">
                         <label for="exam_session"><strong style="color:black;">Session</strong></label>
                         <select id="exam_session" class="form-control">
                         <option value="0">-- Select --</option>
                         <option value="2015-2016">2015-2016</option>
                         <option value="2016-2017">2016-2017</option>
                         <option value="2017-2018">2017-2018</option>
                         </select>
                         </div>
                     </div>
                     <div class="col-sm-4">
                         <div class="form-group mt-2">
                         <label for="exam_semister"><strong style="color:black;">Semister</strong></label>
                         <select id="exam_semister" class="form-control">
                         <option value="0">-- Select --</option>
                         <option value="First">First</option>
                         <option value="Second">Second</option>
                         <option value="Third">Third</option>
                         <option value="Fourth">Fourth</option>
                         <option value="Fifth">Fifth</option>
                         </select>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                  <div class="col-sm-3">
                   <div class="form-group mt-2">
                   <label for="exam_course"><strong style="color:black;">Course</strong></label>
                   <select id="exam_course" class="form-control">
                   <option value="0">-- Select --</option>
                   <option value="CIT">CIT</option>
                   <option value="CCE">CCE</option>
                   </select>
                   </div>
                  </div>
                  <div class="col-sm-3">
                   <div class="form-group mt-2">
                   <label for="exam_course_id"><strong style="color:black;">Course Id</strong></label>
                   <select id="exam_course_id" class="form-control">
                   <option value="0">-- Select --</option>
                   <option value="CIT-111">CIT-111</option>
                   <option value="CCE-112">CCE-112</option>
                   </select>
                   </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group mt-2">
                      <label for="exam_date"><strong style="color:black;">Exam Date</strong></label>
                      <input type="date" class="form-control" id="exam_date" />
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group mt-2">
                      <label for="exam_time"><strong style="color:black;">Exam Time</strong></label>
                      <input type="time" class="form-control" id="exam_time" />
                      </div>
                  </div>
                 </div>

                 <div class="row">
                  <div class="col-sm-4">
                   <div class="form-group mt-2">
                   <label for="exam_type"><strong style="color:black;">Exam Type</strong></label>
                   <select id="exam_type" class="form-control">
                   <option value="0">-- Select --</option>
                   <option value="CT">CT</option>
                   <option value="Final">Final</option>
                   </select>
                   </div>
                  </div>
                  <div class="col-sm-4">
                   <div class="form-group mt-2">
                   <label for="exam_mark"><strong style="color:black;">Mark</strong></label>
                   <input type="text" class="form-control" id="exam_mark" placeholder="Enter Exam mark">
                   </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="form-group mt-2">
                      <label for="exam_du"><strong style="color:black;">Duration</strong></label>
                      <input type="text" class="form-control" id="exam_du" placeholder="Miniute"/>
                      </div>
                  </div>
                 </div>
                 <button type="submit" class="mt-3 btn btn-info form-control" id="add_exam_btn">SignUp</button>
             </form>
             </div>
         </div>
      </div>
    </div>
    <button type="button" class="btn btn-close" data-dismiss="modal" style="display: none;">Close</button>
 </div>
</div>
<!------===========Add Exam Information Modal End=============--------->  




<!------===========Edit Exam Information Modal Start=============--------->  
<div class="modal fade" id="EditExamIbformation" tabindex="-1" role="dialog" aria-labelledby="EditExamIbformationTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     <div class="modal-content bg-dark">
       <div class="modal-body">
          <div class="card modal_Exam">
              <div class="card-header text-center bg-info">
                  <span class="h3"> Edit Examnation Details </span>
              </div>
              <div class="card-body">
              <strong><div  style="display: none;" class='alert bg-danger alert-dismissible fade show text-center' role='alert' id="edit_exam_error"></div></strong>
              <strong><div  style="display: none;" class='alert bg-success alert-dismissible fade show text-center' id="edit_exam_success" role='alert'></div></strong>
              <form id="edit_exam_form">
               <input type="hidden"  id="edit_exam_id">
                 <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group mt-2">
                            <label for="edit_exam_fac"><strong style="color:black;">Faculty </strong></label>
                            <select id="edit_exam_fac" class="form-control">
                               <option value="0">-- Select --</option>
                               <option value="CSE">CSE</option>
                               <option value="EEE">EEE</option>
                               <option value="AG">AG</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mt-2">
                          <label for="edit_exam_session"><strong style="color:black;">Session</strong></label>
                          <select id="edit_exam_session" class="form-control">
                          <option value="0">-- Select --</option>
                          <option value="2015-2016">2015-2016</option>
                          <option value="2016-2017">2016-2017</option>
                          <option value="2017-2018">2017-2018</option>
                          </select>
                          </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group mt-2">
                          <label for="edit_exam_semister"><strong style="color:black;">Semister</strong></label>
                          <select id="edit_exam_semister" class="form-control">
                          <option value="0">-- Select --</option>
                          <option value="First">First</option>
                          <option value="Second">Second</option>
                          <option value="Third">Third</option>
                          <option value="Fourth">Fourth</option>
                          <option value="Fifth">Fifth</option>
                          </select>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                   <div class="col-sm-3">
                    <div class="form-group mt-2">
                    <label for="edit_exam_course"><strong style="color:black;">Course</strong></label>
                    <select id="edit_exam_course" class="form-control">
                    <option value="0">-- Select --</option>
                    <option value="CIT">CIT</option>
                    <option value="CCE">CCE</option>
                    </select>
                    </div>
                   </div>
                   <div class="col-sm-3">
                    <div class="form-group mt-2">
                    <label for="edit_exam_course_id"><strong style="color:black;">Course Id</strong></label>
                    <select id="edit_exam_course_id" class="form-control">
                    <option value="0">-- Select --</option>
                    <option value="CIT-111">CIT-111</option>
                    <option value="CCE-112">CCE-112</option>
                    </select>
                    </div>
                   </div>
                   <div class="col-sm-3">
                       <div class="form-group mt-2">
                       <label for="edit_exam_date"><strong style="color:black;">Exam Date</strong></label>
                       <input type="date" class="form-control" id="edit_exam_date" />
                       </div>
                   </div>
                   <div class="col-sm-3">
                       <div class="form-group mt-2">
                       <label for="edit_exam_time"><strong style="color:black;">Exam Time</strong></label>
                       <input type="time" class="form-control" id="edit_exam_time" />
                       </div>
                   </div>
                  </div>
 
                  <div class="row">
                   <div class="col-sm-4">
                    <div class="form-group mt-2">
                    <label for="edit_exam_type"><strong style="color:black;">Exam Type</strong></label>
                    <select id="edit_exam_type" class="form-control">
                    <option value="0">-- Select --</option>
                    <option value="CT">CT</option>
                    <option value="Final">Final</option>
                    </select>
                    </div>
                   </div>
                   <div class="col-sm-4">
                    <div class="form-group mt-2">
                    <label for="edit_exam_mark"><strong style="color:black;">Mark</strong></label>
                    <input type="text" class="form-control" id="edit_exam_mark" placeholder="Enter Exam mark">
                    </div>
                   </div>
                   <div class="col-sm-4">
                       <div class="form-group mt-2">
                       <label for="edit_exam_du"><strong style="color:black;">Duration</strong></label>
                       <input type="text" class="form-control" id="edit_exam_du" placeholder="Miniute"/>
                       </div>
                   </div>
                  </div>
                  <button type="submit" class="mt-3 btn btn-info form-control" id="edit_exam_btn">Update</button>
              </form>
              </div>
          </div>
       </div>
     </div>
     <button type="button" class="btn btn-close" data-dismiss="modal" style="display: none;">Close</button>
  </div>
 </div>
<!------===========Edit Exam Information Modal End=============------------>
  </section>
</div>


@endsection

@push('scripts')
<script>
  
$("#before").hide();
$("#add_exam_btn").click(function(e){
   e.preventDefault();

   //<!--====== Access SignUp  Form Data======-->
   let exam_fac   =   $("#exam_fac").val();
   let exam_session   =   $("#exam_session").val();
   let exam_semister   =   $("#exam_semister").val();
   let exam_course   =   $("#exam_course").val();
   let exam_course_id    =   $("#exam_course_id").val();
   let exam_date   =   $("#exam_date").val();
   let exam_time   =   $("#exam_time").val();
   let exam_type   =   $("#exam_type").val();
   let exam_mark   =   $("#exam_mark").val();
   let exam_du   =   $("#exam_du").val();
   let _token =   $('meta[name="csrf-token"]').attr('content');

   if(exam_fac=="0")
   {
    $("#exam_error").show(50);
    $("#exam_error").text('Select Faculty');
    }else if(exam_session == '0'){
      $("#exam_error").show(50);
      $("#exam_error").text('Select Session');
   }else if(exam_semister == '0'){
      $("#exam_error").show(50);
      $("#exam_error").text('Select Semister');
    }else if(exam_course == '0'){
      $("#exam_error").show(50);
      $("#exam_error").text('Select Course');
    }else if(exam_course_id == '0'){
      $("#exam_error").show(50);
      $("#exam_error").text('Select Course Id');
    }else if(exam_date == ''){
      $("#exam_error").show(50);
      $("#exam_error").text('Insert Exam Date');
    }else if(exam_time == ''){
      $("#exam_error").show(50);
      $("#exam_error").text('Insert Exam Time');
    }else if(exam_type == '0'){
      $("#exam_error").show(50);
      $("#exam_error").text('Select Exam Type');
    }else if(exam_mark == ''){
      $("#exam_error").show(50);
      $("#exam_error").text('Insert Exam Mark');
    }else if(exam_du == ''){
      $("#exam_error").show(50);
      $("#exam_error").text('Insert Exam Duration');
    }else{
      $("#before").show();
      setTimeout(() => {
        $.ajax({
            url: "/teacher/add_exam",
            type:"POST",
            data:{
              exam_fac:exam_fac,
              exam_session:exam_session,
              exam_semister:exam_semister,
              exam_course:exam_course,
              exam_course_id:exam_course_id,
              exam_date:exam_date,
              exam_time:exam_time,
              exam_type:exam_type,
              exam_mark:exam_mark,
              exam_du:exam_du,
              _token: _token
            },
            success:function(response){
            console.log(response);
              if(response.error)
              {
             $("#before").hide();
              $("#exam_error").show(100);
              $("#exam_error").text(response.error);
              }else{
                  $("#exam_form").trigger('reset');
                  $("#exam_error").hide(200);
            
                  setTimeout(function(){
                   $("#before").hide();
                    $("#exam_success").show(50);
                    $("#exam_success").text(response.success);
                    $(location).attr('href', '/teacher/exam');
                  },500);
              }
            }
        });
      }, 5000);
    }

});


//<!--====== Status Management ======-->
$(document).on('click','.status_check_exam',function(){
  var ids = $(this).val();
  var start = $(this).attr('data-start');
  var status = $(this).attr('data-status');
  let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
      url: "/exam/status",
      type:"POST",
      data:{
        id:ids,
        start:start,
        status:status,
        _token: _token
      },
      success:function(response)
      {            
        if(response.error)
          {
            $('.error').html("<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'><strong>Inserrt Question First</strong></div>");
              $(location).attr('href', '/teacher/exam');
          }else{
            $('.error').hide();
            $('.success').html("<div class='alert alert-success alert-dismissible fade show text-center' role='alert'><strong>Status Updated Successfully</strong></div>");

            setTimeout(function(){
            $('.success').hide(500);
            },2500);            
            
            setTimeout(function(){
              $(location).attr('href', '/teacher/exam');
            },1000);
          }
      }

    });
});

function examdeletes(id)
{
  $.ajax({
      url:"/teacher/exam/delete/"+id,
      type:"GET",
      dataType:"json",
      success:function(data)
      {
         $('.success').show();
            $('.success').html("<div class='alert alert-success alert-dismissible fade show text-center' role='alert'><strong>Exam Deleted Successfully</strong></div>");

            setTimeout(function(){
            $('.success').hide(500);
            },1500);            
            
            setTimeout(function(){
              $(location).attr('href', '/teacher/exam');
            },500);
      }
  });
}




$("#edit_exam_btn").click(function(e){
   e.preventDefault();

   //<!--====== Access SignUp  Form Data======-->
   let edit_exam_id   =   $("#edit_exam_id").val();
   let edit_exam_fac   =   $("#edit_exam_fac").val();
   let edit_exam_session   =   $("#edit_exam_session").val();
   let edit_exam_semister   =   $("#edit_exam_semister").val();
   let edit_exam_course   =   $("#edit_exam_course").val();
   let edit_exam_course_id    =   $("#edit_exam_course_id").val();
   let edit_exam_date   =   $("#edit_exam_date").val();
   let edit_exam_time   =   $("#edit_exam_time").val();
   let edit_exam_type   =   $("#edit_exam_type").val();
   let edit_exam_mark   =   $("#edit_exam_mark").val();
   let edit_exam_du   =   $("#edit_exam_du").val();
   let _token =   $('meta[name="csrf-token"]').attr('content');

   if(edit_exam_fac=="0")
   {
    $("#edit_exam_error").show(50);
    $("#edit_exam_error").text('Select Faculty');
    }else if(edit_exam_session == '0'){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Select Session');
   }else if(edit_exam_semister == '0'){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Select Semister');
    }else if(edit_exam_course == '0'){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Select Course');
    }else if(edit_exam_course_id == '0'){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Select Course Id');
    }else if(edit_exam_date == ''){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Insert Exam Date');
    }else if(edit_exam_time == ''){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Insert Exam Time');
    }else if(edit_exam_type == '0'){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Select Exam Type');
    }else if(edit_exam_mark == ''){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Insert Exam Mark');
    }else if(edit_exam_du == ''){
      $("#edit_exam_error").show(50);
      $("#edit_exam_error").text('Insert Exam Duration');
    }else{
      $.ajax({
          url: "/teacher/edit_exam",
          type:"POST",
          data:{
            edit_exam_id:edit_exam_id,
            edit_exam_fac:edit_exam_fac,
            edit_exam_session:edit_exam_session,
            edit_exam_semister:edit_exam_semister,
            edit_exam_course:edit_exam_course,
            edit_exam_course_id:edit_exam_course_id,
            edit_exam_date:edit_exam_date,
            edit_exam_time:edit_exam_time,
            edit_exam_type:edit_exam_type,
            edit_exam_mark:edit_exam_mark,
            edit_exam_du:edit_exam_du,
            _token: _token
          },
          success:function(response){
           console.log(response);
            if(response.error)
            {
             $("#edit_exam_error").show(100);
             $("#edit_exam_error").text(response.error);
            }else{
                $("#edit_exam_form").trigger('reset');
                $("#edit_exam_error").hide(200);
          
                setTimeout(function(){
                  $("#edit_exam_success").show(50);
                  $("#edit_exam_success").text(response.success);
                  $(location).attr('href', '/teacher/exam');
                },500);
            }
          }
    })
    }

});




function edit_exam_details(id)
{
  $.ajax({
      url:"/teacher/exam/edit/"+id,
      type:"GET",
      dataType:"json",
      success:function(response)
      {
        console.log(response.data[0].faculty);
          //<!--====== Access SignUp  Form Data======-->
          $("#edit_exam_id").val(id);
          $("#edit_exam_fac").val(response.data[0].faculty);
          $("#edit_exam_session").val(response.data[0].session);
          $("#edit_exam_semister").val(response.data[0].semister);
          $("#edit_exam_course").val(response.data[0].course);
          $("#edit_exam_course_id").val(response.data[0].course_id);
          //$("#edit_exam_date").val(response.data[0].exam_date);
          //$("#edit_exam_time").val(response.data[0].exam_time);
          $("#edit_exam_type").val(response.data[0].exam_type);
          $("#edit_exam_mark").val(response.data[0].exam_mark);
          $("#edit_exam_du").val(response.data[0].exam_duration);
      }
  });
}



</script>
@endpush